@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Languages</span></li>
                </ul>
            </div>
            <div class="flex-align gap-8 flex-wrap">
                <a href="{{ route('admin.language.create') }}" class="btn btn-main rounded-pill py-9">Add Language</a>
            </div>
        </div>

        <div class="card overflow-hidden">
            <div class="card-body p-0 overflow-x-auto">
                <table id="languageTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="fixed-width">
                                <div class="form-check">
                                    <input class="form-check-input border-gray-200 rounded-4" type="checkbox" id="selectAll">
                                </div>
                            </th>
                            <th class="h6 text-gray-300">Name</th>
                            <th class="h6 text-gray-300">Status</th>
                            <th class="h6 text-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($languages as $language)
                            <tr>
                                <td class="fixed-width">
                                    <div class="form-check">
                                        <input class="form-check-input border-gray-200 rounded-4" type="checkbox" name="selected[]" value="{{ $language->id }}">
                                    </div>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $language->name }}</span>
                                </td>
                                <td>
                                    <span class="text-13 py-2 px-8 {{ $language->status == 1 ? 'bg-success-50 text-success-600' : 'bg-warning-50 text-warning-600' }} d-inline-flex align-items-center gap-8 rounded-pill">
                                        <span class="w-6 h-6 {{ $language->status == 1 ? 'bg-success-600' : 'bg-warning-600' }} rounded-circle flex-shrink-0"></span>
                                        {{ $language->status == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                
                                <td>
                                    <a href="{{ route('admin.language.edit', $language->id) }}"
                                        class="bg-main-50 text-main-600 py-2 px-14 rounded-pill hover-bg-main-600 hover-text-white">Edit</a>
                                    <form action="{{ route('admin.language.destroy', $language->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-danger-50 text-danger-600 py-2 px-14 rounded-pill hover-bg-danger-600 hover-text-white"
                                            onclick="return confirm('Are you sure you want to delete this language?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No languages found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-24">
            {{ $languages->links() }}
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