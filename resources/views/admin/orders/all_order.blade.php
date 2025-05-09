@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">All Orders</span></li>
                </ul>
            </div>
        </div>

        <div class="card overflow-hidden">
            <div class="card-body p-0 overflow-x-auto">
                <table id="purchaseTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="h6 text-gray-300">S.R</th>
                            <th class="h6 text-gray-300">Name</th>
                            <th class="h6 text-gray-300">Email</th>
                            <th class="h6 text-gray-300">Mobile</th>
                            <th class="h6 text-gray-300">Course</th>
                            <th class="h6 text-gray-300">Price</th>
                            <th class="h6 text-gray-300">Date & Time</th>
                            <th class="h6 text-gray-300">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purchases as $index => $purchase)
                            <tr>
                                <td>{{ $purchases->firstItem() + $index + 1 }}</td>
                                <td>
                                    <div class="flex-align gap-8">
                                        <img src="{{ asset($purchase->user->avatar ?? 'images/default-avatar.png') }}" alt="{{ $purchase->user->name }}"
                                            class="w-40 h-40 rounded-circle">
                                        <span class="h6 mb-0 fw-medium text-gray-300">{{ $purchase->user->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $purchase->user->email }}</span>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $purchase->user->contact_no ?? 'N/A' }}</span>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $purchase->course_title }}</span>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ number_format($purchase->amount, 2) }}</span>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $purchase->date->format('d M Y, H:i') }}</span>
                                </td>
                                <td>
                                    <span class="text-13 py-2 px-8 {{ $purchase->status == 'completed' ? 'bg-success-50 text-success-600' : 'bg-warning-50 text-warning-600' }} d-inline-flex align-items-center gap-8 rounded-pill">
                                        <span class="w-6 h-6 {{ $purchase->status == 'completed' ? 'bg-success-600' : 'bg-warning-600' }} rounded-circle flex-shrink-0"></span>
                                        {{ ucfirst($purchase->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No purchases found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-24">
            {{ $purchases->links() }}
        </div>
    </div>
@endsection