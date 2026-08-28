<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $students = Student::query()
            ->when($search, function ($query, $search) {
                $query->where('student_id', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('middle_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('course', 'like', "%{$search}%")
                    ->orWhere('program', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created student.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|max:50|unique:students,student_id',

            'first_name' => 'required|string|max:100',

            'middle_name' => 'nullable|string|max:100',

            'last_name' => 'required|string|max:100',

            'email' => 'required|email|max:255|unique:students,email',

            'mobile_number' => 'required|numeric',

            'date_of_birth' => 'required|date',

            'gender' => 'required|string|max:50',

            'program' => 'required|string|max:255',

            'year_level' => 'required|string|max:50',

            'address' => 'required|string|max:500',

            'profile_picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create Full Name
        |--------------------------------------------------------------------------
        */

        $validated['name'] = trim(
            $validated['first_name'] . ' ' .
            ($validated['middle_name'] ?? '') . ' ' .
            $validated['last_name']
        );

        /*
        |--------------------------------------------------------------------------
        | Upload Profile Picture
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('profile-pictures', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Save Student
        |--------------------------------------------------------------------------
        */

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student registered successfully!');
    }

    /**
     * Display the specified student.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified student.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|max:50|unique:students,student_id,' . $student->id,

            'first_name' => 'required|string|max:100',

            'middle_name' => 'nullable|string|max:100',

            'last_name' => 'required|string|max:100',

            'email' => 'required|email|max:255|unique:students,email,' . $student->id,

            'mobile_number' => 'required|numeric',

            'date_of_birth' => 'required|date',

            'gender' => 'required|string|max:50',

            'program' => 'required|string|max:255',

            'year_level' => 'required|string|max:50',

            'address' => 'required|string|max:500',

            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Full Name
        |--------------------------------------------------------------------------
        */

        $validated['name'] = trim(
            $validated['first_name'] . ' ' .
            ($validated['middle_name'] ?? '') . ' ' .
            $validated['last_name']
        );

        /*
        |--------------------------------------------------------------------------
        | Update Profile Picture
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_picture')) {

            // Delete old picture
            if ($student->profile_picture) {
                Storage::disk('public')->delete($student->profile_picture);
            }

            // Store new picture
            $validated['profile_picture'] = $request
                ->file('profile_picture')
                ->store('profile-pictures', 'public');
        } else {
            // Keep existing profile picture
            unset($validated['profile_picture']);
        }

        /*
        |--------------------------------------------------------------------------
        | Update Student
        |--------------------------------------------------------------------------
        */

        $student->update($validated);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified student.
     */
    public function destroy(Student $student)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Profile Picture
        |--------------------------------------------------------------------------
        */

        if ($student->profile_picture) {
            Storage::disk('public')->delete($student->profile_picture);
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Student
        |--------------------------------------------------------------------------
        */

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}