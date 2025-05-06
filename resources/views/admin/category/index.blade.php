@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}"
                            class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">All Categories</span></li>
                </ul>
            </div>
            <div class="flex-align gap-8 flex-wrap">
                <div
                    class="flex-align text-gray-500 text-13 border border-gray-100 rounded-4 ps-20 focus-border-main-600 bg-white">
                    <span class="text-lg"><i class="ph ph-layout"></i></span>
                    <a href="{{ route('admin.categories.create') }}"
                        class="form-control ps-8 pe-20 py-16 border-0 text-inherit rounded-4 text-center">+ Add Category</a>
                </div>
            </div>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Success!</strong> {{ session('success') }}
            </div>
        @endif

        @if (session('warning'))
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Warning!</strong> {{ session('warning') }}
            </div>
        @endif
        <div class="card overflow-hidden">
            <div class="card-body p-0 overflow-x-auto">
                <table id="studentTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="fixed-width">
                                <div class="form-check">
                                    <input class="form-check-input border-gray-200 rounded-4" type="checkbox"
                                        id="selectAll">
                                </div>
                            </th>
                            <th class="h6 text-gray-300">Category</th>
                            <th class="h6 text-gray-300">Description</th>
                            <th class="h6 text-gray-300">Status</th>
                            <th class="h6 text-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td><input type="checkbox" class="category-checkbox" value="{{ $category->id }}" /></td>
                                <td>
                                    <div class="flex-align gap-8">
                                        <img src="{{ $category->thumbnail ? asset('' . $category->thumbnail) : asset('images/placeholder.png') }}"
                                            class="w-40 h-40 rounded-circle" alt="{{ $category->name }}">
                                        <span class="h6 mb-0 fw-medium text-gray-300">{{ $category->name }}</span>
                                    </div>
                                </td>
                                <td><span class="h6 mb-0 fw-medium text-gray-300">{{ $category->description ?? 'N/A' }}</span>
                                </td>
                                <td>
                                    <span
                                        class="text-13 py-2 px-8 {{ $category->status == 'public' ? 'bg-success-50 text-success-600' : 'bg-warning-50 text-warning-600' }} d-inline-flex align-items-center gap-8 rounded-pill">
                                        <span
                                            class="w-6 h-6 {{ $category->status == 'public' ? 'bg-success-600' : 'bg-warning-600' }} rounded-circle flex-shrink-0"></span>
                                        {{ ucfirst($category->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('selectAll').addEventListener('change', function () {
            document.querySelectorAll('.category-checkbox').forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
@endsection