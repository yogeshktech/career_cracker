@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Testimonials</span></li>
                </ul>
            </div>
            <div class="flex-align justify-content-end gap-8">
                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-main rounded-pill py-9">Add New Testimonial</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-bottom border-gray-100 flex-align gap-8">
                <h5 class="mb-0">Testimonial List</h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($testimonials->isEmpty())
                    <p>No testimonials found.</p>
                @else
                    <table id="dataTable" data-toggle="table" data-search="true"
                    data-pagination="true" data-page-size="10" data-sortable="true" data-show-columns="true"
                    data-show-refresh="true" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Designation</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td>{{ $testimonial->name }}</td>
                                    <td><img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}" style="max-height: 100px;"></td>
                                    <td>{{ $testimonial->designation }}</td>
                                    <td>{{ $testimonial->created_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-outline-main">Edit</a>
                                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $testimonials->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection