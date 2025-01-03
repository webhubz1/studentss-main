@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Main Content -->
    <section class="dashboard-stats">
        <a href="{{ route('students.program', ['program' => 'BSIT', 'school_year' => date('Y')]) }}" class="stat-card">
            <h3>BSIT</h3>
        </a>
        <a href="{{ route('students.program', ['program' => 'COMSCI', 'school_year' => date('Y')]) }}" class="stat-card">
            <h3>COMSCI</h3>
        </a>
        <a href="{{ route('students.program', ['program' => 'BLIS', 'school_year' => date('Y')]) }}" class="stat-card">
            <h3>BLIS</h3>
        </a>
        <a href="{{ route('students.program', ['program' => 'ENGINEERING', 'school_year' => date('Y')]) }}" class="stat-card">
            <h3>ENGINEERING</h3>
        </a>
    </section>
</div>
@endsection

@section('css')
<style>
    /* Global Body Styles */
    body {
        font-family: 'Poppins', sans-serif; /* Modern, clean font */
        background-color: #f3f6f9; /* Subtle gray for a polished look */
        margin: 0;
        color: #2e2e2e; /* Neutral text color */
    }

    /* Dashboard Container */
    .dashboard-container {
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
       
    }

    /* Stats Section */
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Flexible grid layout */
        gap: 20px;
        width: 100%;
        max-width: 1200px;
    }

    /* Stat Card Design */
    .stat-card {
        background: #ffffff;
        padding: 40px;
        margin: 0;
        text-align: center;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: #2e2e2e;
        transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
    }

    .stat-card h3 {
        font-size: 1.6rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333333;
    }

    .stat-card p {
        font-size: 1rem;
        color: #666666;
    }

    /* Hover Effect */
    .stat-card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        background: linear-gradient(135deg, #ffffff, #eceff1); /* Subtle gradient */
        transform: translateY(-5px); /* Lift effect */
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .stat-card {
            padding: 30px;
        }

        .stat-card h3 {
            font-size: 1.4rem;
        }
    }
</style>


@endsection
