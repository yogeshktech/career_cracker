@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}"
                            class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">All newsletter</span></li>
                </ul>
            </div>

        </div>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="card overflow-hidden">
            <div class="card-body p-0 overflow-x-auto">
                <table id="dataTable" data-toggle="table" data-search="true"
                    data-pagination="true" data-page-size="10" data-sortable="true" data-show-columns="true"
                    data-show-refresh="true" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="h6 text-gray-300">Email</th>
                            <th class="h6 text-gray-300">Date & Time</th>
                            <th class="h6 text-gray-300">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($newsletters as $newsletter)
                            <tr>
                                
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $newsletter->email }}</span>
                                </td>
                              
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $newsletter->created_at }}</span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.news_letters.delete', $newsletter->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-danger-50 text-danger-600 py-2 px-14 rounded-pill hover-bg-danger-600 hover-text-white"
                                            onclick="return confirm('Are you sure you want to delete this applicant?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No applicants found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-24">
            {{ $newsletters->links() }}
        </div>
    </div>

    <script>
        document.getElementById('selectAll').addEventListener('change', function () {
            document.querySelectorAll('input[name="selected[]"]').forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
@endsection