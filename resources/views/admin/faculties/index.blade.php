@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Faculty</span></li>
                </ul>
            </div>
            <div class="flex-align gap-8 flex-wrap">
                <a href="{{ route('admin.faculties.create') }}" class="btn btn-main rounded-pill py-9">Add Faculty</a>
            </div>
        </div>

        <div class="card overflow-hidden">
            <div class="card-body p-0 overflow-x-auto">
                <table id="facultyTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="h6 text-gray-300">Faculty</th>
                            <th class="h6 text-gray-300">Email</th>
                            <th class="h6 text-gray-300">Course</th>
                            <th class="h6 text-gray-300">Position</th>
                            <th class="h6 text-gray-300">Status</th>
                            <th class="h6 text-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($faculties as $faculty)
                            <tr>
                                <td>
                                    <div class="flex-align gap-8">
                                        <img src="{{ asset($faculty->profile_image) }}" alt="{{ $faculty->name }}"
                                            class="w-40 h-40 rounded-circle">
                                        <span class="h6 mb-0 fw-medium text-gray-300">{{ $faculty->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $faculty->email }}</span>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $faculty->course->title }}</span>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $faculty->position }}</span>
                                </td>
                                <td>
                                    <span class="text-13 py-2 px-8 {{ $faculty->status == 'published' ? 'bg-success-50 text-success-600' : 'bg-warning-50 text-warning-600' }} d-inline-flex align-items-center gap-8 rounded-pill">
                                        <span class="w-6 h-6 {{ $faculty->status == 'published' ? 'bg-success-600' : 'bg-warning-600' }} rounded-circle flex-shrink-0"></span>
                                        {{ ucfirst($faculty->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.faculties.edit', $faculty->id) }}"
                                        class="bg-main-50 text-main-600 py-2 px-14 rounded-pill hover-bg-main-600 hover-text-white">Edit</a>
                                    <form action="{{ route('admin.faculties.destroy', $faculty->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-danger-50 text-danger-600 py-2 px-14 rounded-pill hover-bg-danger-600 hover-text-white"
                                            onclick="return confirm('Are you sure you want to delete this faculty?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No faculties found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-24">
            {{ $faculties->links() }}
        </div>
    </div>

    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            document.querySelectorAll('input[name="selected[]"]').forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
@endsection