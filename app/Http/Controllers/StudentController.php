<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Events\StudentRegistered;

class StudentController extends Controller
{
    // 1. List all students
    public function index()
    {

        $students = Cache::remember('students_list', 60, function () {

            return Student::all();
        });

        // $students = Student::all();
        return view('students.index', compact('students'));
    }

    // 2. Show Create Form
    public function create()
    {
        return view('students.create');
    }

    // 3. Store new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required', // Adjust fields to match your DB
            'email' => 'required|email',
            'age' => 'required|integer',
        ]);

        // 1. Create the student
        $student = Student::create($validated);

        // 2. Dispatch the Event (The new part!)
        event(new StudentRegistered($student));

        return redirect()->route('students.index');
    }

    // 4. Show Edit Form
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // 5. Update student
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

    // 6. Delete student
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
