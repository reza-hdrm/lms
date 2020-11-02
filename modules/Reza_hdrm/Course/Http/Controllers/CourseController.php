<?php

namespace Reza_hdrm\Course\Http\Controllers;

use Reza_hdrm\Category\Repositories\CategoryRepository;
use Reza_hdrm\User\Repositories\UserRepository;

class CourseController
{
    private $userRepository;
    private $categoryRepository;

    public function __construct(UserRepository $userRepository, CategoryRepository $categoryRepository) {
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index() {
        return 'courses';
    }

    public function create() {
        $teachers = $this->userRepository->getTeachers();
        $categories = $this->categoryRepository->all();
        return view('Courses::create', compact('teachers', 'categories'));
    }
}
