<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Display the form for creating a new student
    public function create()
    {
        return view('admin.Add-student.index'); // Ensure this view exists
    }

    // Store the student data
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'school_year' => 'required|string|max:10',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'student_id' => 'required|unique:students,student_id',  // Ensure unique student_id
            'age' => 'required|integer|min:1',
            'sex' => 'required|in:Male,Female',
            'program' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'contact_no' => 'required|string|max:15',
            'father_name' => 'required|string|max:255',
            'father_contact_no' => 'nullable|string|max:15',
            'mother_name' => 'required|string|max:255',
            'mother_contact_no' => 'nullable|string|max:15',
            'guardian_name' => 'required|string|max:255',
            'guardian_contact_no' => 'nullable|string|max:15',
            'guardian_address' => 'nullable|string|max:255',
            'high_school_name' => 'required|string|max:255',
            'graduation_year' => 'required|integer|between:2000,2040', // Graduation year validation
            'previous_college' => 'nullable|string|max:255',
            'highest_level_completed' => 'required|string|max:255',
            'college_year_level' => 'nullable|string',
        ]);
    
        // Create the student without generating the student number
        $student = Student::create($validatedData);
    
        if ($student) {
            return response()->json([
                'success' => true,
                'message' => 'Student added successfully.',
                'student_id' => $student->id // Send the student ID in the response
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add student.',
                'errors' => 'There was an issue with saving the student to the database.' // More detailed error message
            ]);
        }
    }

    // Show the form to view a student (if needed, you can add logic here for listing students)
    public function viewStudent()
    {
        return view('admin.View-Student.index'); // Show the view student form
    }

    // Search for a student by name (first, last, or middle)
    public function searchStudent(Request $request)
    {
        // Validate the search request, allowing for first name, last name, middle name, or student id search
        $request->validate([
            'last_name' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'student_id' => 'nullable|exists:students,student_id|string|max:255', // Add validation for student_id
        ]);

        // Initialize query builder
        $query = Student::query();

        // Define search conditions in an array to make it dynamic
        $conditions = [
            'student_id' => 'like',
            'last_name' => 'like',
            'first_name' => 'like',
            'middle_name' => 'like',
        ];

        // Loop through conditions and apply filters dynamically
        foreach ($conditions as $field => $operator) {
            if ($request->filled($field)) {
                $query->where($field, $operator, '%' . $request->$field . '%');
            }
        }

        // Execute the query to get matching students
        $students = $query->get();

        // If no students are found, return an error message
        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'No students found matching the search criteria.');
        }

        // Return the students to the view
        return view('admin.View-Student.index', compact('students'));
    }

    public function index()
{
    $students = Student::all();
    return view('admin.View-Student.index', compact('students'));
}

public function edit($id)
{
    $student = Student::findOrFail($id);
    return view('admin.View-Student.edit', compact('student'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'school_year' => 'required|string|max:10',
        'last_name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'age' => 'required|integer|min:1',
        'sex' => 'required|in:Male,Female',
        'program' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $id,
        'contact_no' => 'required|string|max:15',
        'father_name' => 'required|string|max:255',
        'mother_name' => 'required|string|max:255',
        'guardian_name' => 'required|string|max:255',
        'high_school_name' => 'required|string|max:255',
        'graduation_year' => 'required|integer|between:2000,2040',
        'highest_level_completed' => 'required|string|max:255',
    ]);

    $student = Student::findOrFail($id);
    $student->update($validatedData);

    return redirect()->route('students.index')->with('success', 'Student updated successfully.');
}

public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
}

}
