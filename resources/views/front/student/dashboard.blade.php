@extends('front.student.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-content">
        <div class="container">
            <h4 class="dashboard-title">Dashboard</h4>
            <div class="dashboard-info">
                <div class="row gy-2 gy-sm-6">
                    <div class="col-md-4 col-sm-6">
                        <div class="dashboard-info__card">
                            <a class="dashboard-info__card-box" href="{{ route('student.enrolled.courses') }}">
                                <div class="dashboard-info__card-icon icon-color-01">
                                    <i class="edumi edumi-open-book"></i>
                                </div>
                                <div class="dashboard-info__card-content">
                                    <div class="dashboard-info__card-value">{{ $enrolledCourses }}</div>
                                    <div class="dashboard-info__card-heading">Enrolled Courses</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="dashboard-info__card">
                            <a class="dashboard-info__card-box" href="{{ route('student.enrolled.courses') }}">
                                <div class="dashboard-info__card-icon icon-color-02">
                                    <i class="edumi edumi-streaming"></i>
                                </div>
                                <div class="dashboard-info__card-content">
                                    <div class="dashboard-info__card-value">{{ $activeCourses }}</div>
                                    <div class="dashboard-info__card-heading">Active Courses</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="dashboard-info__card">
                            <a class="dashboard-info__card-box" href="{{ route('student.enrolled.courses') }}">
                                <div class="dashboard-info__card-icon icon-color-03">
                                    <i class="edumi edumi-correct"></i>
                                </div>
                                <div class="dashboard-info__card-content">
                                    <div class="dashboard-info__card-value">{{ $completedCourses }}</div>
                                    <div class="dashboard-info__card-heading">Completed Courses</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection