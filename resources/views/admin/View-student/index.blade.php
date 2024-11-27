@extends('adminlte::page')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Search Form -->
            <h3 class="text-center">Search Student by Last Name or Student ID</h3>
            <form action="{{ route('students.search') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="last_name" class="form-control" placeholder="Enter Student Last Name" value="{{ old('last_name') }}" aria-label="Student Last Name">
                    <input type="text" name="student_id" class="form-control" placeholder="Enter Student ID" value="{{ old('student_id') }}" aria-label="Student ID">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <!-- Display error message if no student found -->
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Display Student Information if a student is found -->
            @if(isset($students) && $students->isNotEmpty())
                <div class="container mt-4 p-4 border rounded shadow">
                    <h3 class="text-center">Student Data Profiles</h3>
                    @foreach($students as $student)
                        <form>  
                            <!-- General Information -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="name" class="form-control" 
                                           value="{{ $student->last_name . ', ' . $student->first_name . ' ' . ($student->middle_name ? $student->middle_name : '') }}" 
                                           readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="student_id">Student ID</label>
                                    <input type="text" id="student_id" class="form-control" value="{{ $student->student_id }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="college_year_level">College Year Level</label>
                                    <input type="text" id="college_year_level" class="form-control" value="{{ $student->college_year_level }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="school_year">School Year</label>
                                    <input type="text" id="school_year" class="form-control" value="{{ $student->school_year }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="age">Age</label>
                                    <input type="text" id="age" class="form-control" value="{{ $student->age }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="sex">Sex</label>
                                    <input type="text" id="sex" class="form-control" value="{{ $student->sex }}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="program">Program</label>
                                    <input type="text" id="program" class="form-control" value="{{ $student->program }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" class="form-control" value="{{ $student->address }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control" value="{{ $student->email }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="contact_no">Contact No.</label>
                                    <input type="text" id="contact_no" class="form-control" value="{{ $student->contact_no }}" readonly>
                                </div>
                            </div>

                            <!-- Family Information -->
                            <hr>
                            <h4 class="text-center">Family Information</h4>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="father_name">Father's Name</label>
                                    <input type="text" id="father_name" class="form-control" value="{{ $student->father_name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="father_contact_no">Father's Contact No.</label>
                                    <input type="text" id="father_contact_no" class="form-control" value="{{ $student->father_contact_no }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="mother_name">Mother's Name</label>
                                    <input type="text" id="mother_name" class="form-control" value="{{ $student->mother_name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="mother_contact_no">Mother's Contact No.</label>
                                    <input type="text" id="mother_contact_no" class="form-control" value="{{ $student->mother_contact_no }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="guardian_name">Guardian</label>
                                    <input type="text" id="guardian_name" class="form-control" value="{{ $student->guardian_name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="guardian_contact_no">Guardian's Contact No.</label>
                                    <input type="text" id="guardian_contact_no" class="form-control" value="{{ $student->guardian_contact_no }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="guardian_address">Guardian's Address</label>
                                <input type="text" id="guardian_address" class="form-control" value="{{ $student->guardian_address }}" readonly>
                            </div>

                            <!-- Educational Background -->
                            <hr>
                            <h4 class="text-center">Educational Background</h4>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="high_school_name">High School Name</label>
                                    <input type="text" id="high_school_name" class="form-control" value="{{ $student->high_school_name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="graduation_year">Graduation Year</label>
                                    <input type="text" id="graduation_year" class="form-control" value="{{ $student->graduation_year }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="previous_college">Previous College</label>
                                    <input type="text" id="previous_college" class="form-control" value="{{ $student->previous_college }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="highest_level_completed">Highest Level Completed</label>
                                    <input type="text" id="highest_level_completed" class="form-control" value="{{ $student->highest_level_completed }}" readonly>
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('students.search') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    @endforeach
                </div>
            @elseif(isset($students) && $students->isEmpty())
                <div class="alert alert-warning">
                    No students found with the given criteria.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
