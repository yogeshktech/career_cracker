@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}"
                           class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Subcategories</span></li>
                </ul>
            </div>
            <div class="buttons flex-align gap-8">
                <a href="{{ route('admin.subcategories.create') }}"
                   class="btn btn-main rounded-pill py-9">Add Subcategory</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-bottom border-gray-100 flex-align gap-8">
                <h5 class="mb-0">Subcategory List</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subcategory->category->name ?? 'N/A' }}</td>
                                <td>{{ $subcategory->name }}</td>
                                <td>
                                    @if($subcategory->thumbnail)
                                        <img src="{{ asset($subcategory->thumbnail) }}" alt="{{ $subcategory->name }}" style="max-height: 50px;">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ ucfirst($subcategory->status) }}</td>
                                <td>
                                    <a href="{{ route('admin.subcategories.edit', $subcategory->id) }}"
                                       class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $subcategories->links() }}
            </div>
        </div>
    </div>
@endsection