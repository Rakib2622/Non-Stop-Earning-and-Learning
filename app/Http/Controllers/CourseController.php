<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    public function index()
    {
        
        $courses = Course::all();
        return view('frontend.after_login.dashboard', compact('courses'));
    }
    // Courses List
    public function courselist()
    {
        abort_if(Gate::denies('course read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    // Insert Course Page
    public function insert_course_page()
    {
        abort_if(Gate::denies('course write'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.courses.create');
    }

    // Insert Course
    public function insert_course(Request $request)
    {
        $course = Course::create($request->all());
        return redirect()->route('admin.courses')->with('success', 'Course added successfully.');
    }

    // Edit Course Page
    public function edit_course_page($id)
    {
        abort_if(Gate::denies('course write'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course'));
    }

    // Update Course
    public function update_course(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());
        return redirect()->route('admin.courses')->with('success', 'Course updated successfully.');
    }

    // Delete Course
    public function delete_course($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('admin.courses')->with('success', 'Course deleted successfully.');
    }

    // Classes List
    public function classlist($course_id)
    {
        abort_if(Gate::denies('course read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $course = Course::findOrFail($course_id);
        $classes = $course->classes;
        return view('admin.classes.index', compact('course', 'classes'));
    }

    // Insert Class Page
    public function insert_class_page($course_id)
    {
        abort_if(Gate::denies('course write'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $course = Course::findOrFail($course_id);
        return view('admin.classes.create', compact('course'));
    }

    // Insert Class
    public function insert_class(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $class = new ClassModel($request->all());
        $course->classes()->save($class);
        return redirect()->route('admin.classes', $course_id)->with('success', 'Class added successfully.');
    }

    // Edit Class Page
    public function edit_class_page($course_id, $class_id)
    {
        abort_if(Gate::denies('course write'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $course = Course::findOrFail($course_id);
        $class = ClassModel::findOrFail($class_id);
        return view('admin.classes.edit', compact('course', 'class'));
    }

    // Update Class
    public function update_class(Request $request, $course_id, $class_id)
    {
        $class = ClassModel::findOrFail($class_id);
        $class->update($request->all());
        return redirect()->route('admin.classes', $course_id)->with('success', 'Class updated successfully.');
    }

    // Delete Class
    public function delete_class($course_id, $class_id)
    {
        $class = ClassModel::findOrFail($class_id);
        $class->delete();
        return redirect()->route('admin.classes', $course_id)->with('success', 'Class deleted successfully.');
    }

    // CourseController.php

public function userCourseList()
{
    // Fetch all courses
    $courses = Course::all();
    
    // Return view with courses
    return view('frontend.after_login.courses.index', compact('courses'));
}


public function userClassList($course_id)
{
    // Fetch classes for the specified course
    $classes = ClassModel::where('course_id', $course_id)->get();
    $course = Course::findOrFail($course_id);
    
    // Return view with classes and course details
    return view('frontend.after_login.courses.enroll', compact('classes', 'course'));
}

}
