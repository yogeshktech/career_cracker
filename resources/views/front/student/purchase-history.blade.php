@extends('front.student.layout')
@section('title', 'Purchase History')
@section('content')
    <div class="dashboard-content">
        <h4 class="dashboard-title">Purchase History</h4>
        <div class="dashboard-purchase-history">
            <div class="dashboard-table table-responsive">
                @if ($purchases->isEmpty())
                    <p>No purchases yet.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="id">ID</th>
                                <th class="courses">Courses</th>
                                <th class="amount">Amount</th>
                                <th class="status">Status</th>
                                <th class="date">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchases as $purchase)
                                <tr>
                                    <td>
                                        <div class="dashboard-table__mobile-heading">ID</div>
                                        <div class="dashboard-table__text">#{{ $purchase->id }}</div>
                                    </td>
                                    <td class="course-info">
                                        <div class="dashboard-table__mobile-heading">Courses</div>
                                        <div class="dashboard-table__text">
                                            <p>{{ $purchase->course_title }}</p>
                                        </div>
                                    </td>
                                    <td class="correct">
                                        <div class="dashboard-table__mobile-heading">Amount</div>
                                        <div class="dashboard-table__text">
                                            <span class="sale-price"> ₹{{ floor($purchase->amount) }}.<small class="separator">{{ sprintf('%02d', ($purchase->amount - floor($purchase->amount)) * 100) }}</small></span>
                                        </div>
                                    </td>
                                    <td class="incorrect">
                                        <div class="dashboard-table__mobile-heading">Status</div>
                                        <div class="dashboard-table__text">{{ $purchase->status }}</div>
                                    </td>
                                    <td class="earned">
                                        <div class="dashboard-table__mobile-heading">Date</div>
                                        <div class="dashboard-table__text">{{ $purchase->date->format('F j, Y') }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection