<?php
namespace Reza_hdrm\Course\Http\Controllers;

use Reza_hdrm\User\Repositories\UserRepo;
use Reza_hdrm\User\Repositories\UserRepository;

class CourseController
{
    public function index()
    {
        return 'courses';
    }

    public function create(UserRepository $userRepo)
    {
        $teachers = $userRepo->getTeachers();
        return view('Courses::create', compact('teachers'));
    }
}
