@extends('adminlte::page')

@section('css')
<style>
    /* Custom Container Styles */
    .container {
        padding-top: 20px;
    }

    /* Card Header */
    .card-header {
        background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
        color: #333;
        font-weight: 600;
        border-bottom: 2px solid #e2e8f0;
        padding: 15px;
        text-align: center;
        border-radius: 5px 5px 0 0;
    }

    /* Card Body */
    .card-body {
        background: #ffffff;
        padding: 25px;
        border-radius: 0 0 5px 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Form Group Labels */
    .form-group label {
        font-weight: 600;
        color: #444;
        margin-bottom: 5px;
    }

    /* Custom Buttons */
    button {
        background: linear-gradient(135deg, #4CAF50, #66BB6A);
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        padding: 12px 20px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    button:hover {
        background: linear-gradient(135deg, #45a049, #5cb85c);
        transform: translateY(-2px);
    }

    /* Table Styling */
    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        background: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    table th, table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }

    table th {
        background: #f8fafc;
        color: #333;
        font-weight: 600;
        text-transform: uppercase;
    }

    table td {
        background: #f9f9f9;
        color: #555;
    }

    table tr:hover {
        background: #e9ecef;
    }

    /* School Year Title */
    .school-year-title {
        color: #333;
        font-size: 1.7em;
        font-weight: 700;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Total Students Info */
    .total-students {
        font-size: 1.4em;
        font-weight: 600;
        color: #444;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Export Button */
    .export-btn {
        margin-top: 20px;
        background: linear-gradient(135deg, #007bff, #5a9dfc);
        color: white;
        padding: 12px 20px;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 600;
        display: inline-block;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .export-btn:hover {
        background: linear-gradient(135deg, #0056b3, #468eea);
        transform: translateY(-2px);
    }
</style>
@endsection

@section('content')
<div class="container">
    <!-- Form to filter by school year -->
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Filter by School Year</h3>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('students.program', ['program' => $program]) }}">
                <div class="form-group">
                    <label for="school_year">School Year:</label>
                    <select name="school_year" id="school_year" class="form-control">
                        <option value="">Select School Year</option>
                        <option value="2023-2024" {{ request('school_year') == '2023-2024' ? 'selected' : '' }}>2023-2024</option>
                        <option value="2024-2025" {{ request('school_year') == '2024-2025' ? 'selected' : '' }}>2024-2025</option>
                        <option value="2024-2025" {{ request('school_year') == '2024-2025' ? 'selected' : '' }}>2024-2025</option>
<option value="2025-2026" {{ request('school_year') == '2025-2026' ? 'selected' : '' }}>2025-2026</option>
<option value="2026-2027" {{ request('school_year') == '2026-2027' ? 'selected' : '' }}>2026-2027</option>
<option value="2027-2028" {{ request('school_year') == '2027-2028' ? 'selected' : '' }}>2027-2028</option>
<option value="2028-2029" {{ request('school_year') == '2028-2029' ? 'selected' : '' }}>2028-2029</option>
<option value="2029-2030" {{ request('school_year') == '2029-2030' ? 'selected' : '' }}>2029-2030</option>
<option value="2030-2031" {{ request('school_year') == '2030-2031' ? 'selected' : '' }}>2030-2031</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="college_year_level">College Year Level:</label>
                    <select name="college_year_level" id="college_year_level" class="form-control">
                        <option value="">Select College Year Level</option>
                        <option value="1st Year" {{ request('college_year_level') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                        <option value="2nd Year" {{ request('college_year_level') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                        <option value="3rd Year" {{ request('college_year_level') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                        <option value="4th Year" {{ request('college_year_level') == '4th Year' ? 'selected' : '' }}>4th Year</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
    </div>

    <!-- Export button -->
    <a href="{{ route('students.export', [
        'school_year' => request('school_year'),
        'program' => $program,
        'college_year_level' => request('college_year_level')
    ]) }}" class="export-btn">Export to Excel</a>

    <!-- Displaying program and school year details only if filtered -->
    @if(request('school_year'))
        <div class="card mb-4">
            <div class="card-header">
                <h2>{{ $program }} Students</h2>
            </div>
            <div class="card-body">
                <!-- Display the filtered School Year -->
                @if(request('school_year'))
                    <div class="school-year-title">
                        <h3>School Year: {{ request('school_year') }}</h3>
                    </div>
                @endif

                <!-- Display the filtered College Year Level -->
                @if(request('college_year_level'))
                    <div class="school-year-title">
                        <h3>Year Level: {{ request('college_year_level') }}</h3>
                    </div>
                @endif

                <div class="total-students">
                    <h3>Total Students: {{ $totalStudents }}</h3>
                </div>

                <!-- Student list organized in a table format -->
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Student ID</th>
                            <th>Year Level</th>
                            <th>School Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->college_year_level }}</td>
                                <td>{{ $student->school_year }}</td>
                                <td>
                                    <a href="{{ route('student.show', $student->id) }}" class="btn btn-info">VIEW STUDENT</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <!-- Optionally show a message when no filter is applied -->
        <div class="alert alert-warning">
            <p>No school year selected. Please filter to see the data.</p>
        </div>
    @endif
</div>
@endsection
