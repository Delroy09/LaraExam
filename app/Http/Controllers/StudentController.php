<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Events\StudentRegistered;

class StudentController extends Controller
{
    public function index()
    {
        $students = Cache::remember('students_list', 60, function () {
            return Student::all();
        });

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'age' => 'required|integer',
        ]);

        $student = Student::create($validated);

        event(new StudentRegistered($student));

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'age' => 'required|integer|max:255',
        ]);

        $student->update($validated);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
