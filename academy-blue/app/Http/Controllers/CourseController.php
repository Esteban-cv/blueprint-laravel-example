<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('course.index', [
            'courses' => $courses,
        ]);
    }

    public function create()
    {
        $users = User::where('role', 'instructor')->get();
        $categories = Category::all();
        return view('course.create', compact('users', 'categories'));
    }

    public function store(CourseStoreRequest $request)
    {
        $course = Course::create($request->validated());
        session()->flash('success', 'Curso guardado exitosamente');

        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        $users = User::where('role', 'instructor')->get();
        $categories = Category::all();

        return view('course.edit', [
            'course' => $course,
            'users' => $users,
            'categories' => $categories
        ]);
    }

    public function update(CourseUpdateRequest $request, Course $course)
    {
        $course->update($request->validated());

        session()->flash('success', 'Curso actualizado exitosamente');

        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        session()->flash('success', 'Curso eliminado exitosamente');
        return redirect()->route('courses.index');
    }
}
