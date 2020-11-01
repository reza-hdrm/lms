<?php
namespace Reza_hdrm\Course\Http\Controllers;

use Reza_hdrm\User\Repositories\UserRepo;

class CourseController
{
    public function index()
    {
        return 'courses';
    }

    public function create(UserRepo $userRepo)
    {
        $teachers = $userRepo->getTeachers();
        return view('Courses::create', compact('teachers'));
    }
}
