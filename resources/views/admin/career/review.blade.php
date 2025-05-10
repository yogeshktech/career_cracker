@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}"
                            class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">All Reviews</span></li>
                </ul>
            </div>
        </div>

        <div class="card overflow-hidden">
            <div class="card-body p-0 overflow-x-auto">
                <table id="dataTable" data-toggle="table" data-search="true"
                    data-pagination="true" data-page-size="10" data-sortable="true" data-show-columns="true"
                    data-show-refresh="true" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="h6 text-gray-300">Name</th>
                            <th class="h6 text-gray-300">Email</th>
                            <th class="h6 text-gray-300">Course</th>
                            <th class="h6 text-gray-300">Rating</th>
                            <th class="h6 text-gray-300">Comments</th>
                            <th class="h6 text-gray-300">Status</th>
                            <th class="h6 text-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reviews as $review)
                            <tr>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $review->name }}</span>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $review->email }}</span>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $review->course->title ?? 'N/A' }}</span>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $review->rating }}</span>
                                </td>
                                <td>
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $review->comment }}</span>
                                </td>
                                <td>
                                    <span class="text-13 py-2 px-8 {{ $review->status == 1 ? 'bg-success-50 text-success-600' : 'bg-warning-50 text-warning-600' }} d-inline-flex align-items-center gap-8 rounded-pill review-status"
                                        data-review-id="{{ $review->id }}">
                                        <span class="w-6 h-6 {{ $review->status == 1 ? 'bg-success-600' : 'bg-warning-600' }} rounded-circle flex-shrink-0"></span>
                                        {{ $review->status == 1 ? 'Approved' : 'Not Approved' }}
                                    </span>
                                </td>
                                <td>
                                    <button class="bg-main-50 text-main-600 py-2 px-14 rounded-pill hover-bg-main-600 hover-text-white toggle-status-btn"
                                        data-review-id="{{ $review->id }}"
                                        data-current-status="{{ $review->status }}"
                                        onclick="toggleReviewStatus(this)">
                                        {{ $review->status == 1 ? 'Unapprove' : 'Approve' }}
                                    </button>
                                    <form action="{{ route('admin.reviews.delete', $review->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-danger-50 text-danger-600 py-2 px-14 rounded-pill hover-bg-danger-600 hover-text-white"
                                            onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No reviews found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-24">
            {{ $reviews->links() }}
        </div>
    </div>

    <script>
        document.getElementById('selectAll').addEventListener('change', function () {
            document.querySelectorAll('input[name="selected[]"]').forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        function toggleReviewStatus(button) {
            const reviewId = button.getAttribute('data-review-id');
            const currentStatus = button.getAttribute('data-current-status');
            const newStatus = currentStatus == '1' ? '0' : '1';

            fetch('/admin/reviews/' + reviewId + '/toggle-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ status: newStatus }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const statusSpan = document.querySelector(`.review-status[data-review-id="${reviewId}"]`);
                    statusSpan.className = `text-13 py-2 px-8 ${newStatus == '1' ? 'bg-success-50 text-success-600' : 'bg-warning-50 text-warning-600'} d-inline-flex align-items-center gap-8 rounded-pill review-status`;
                    statusSpan.innerHTML = `
                        <span class="w-6 h-6 ${newStatus == '1' ? 'bg-success-600' : 'bg-warning-600'} rounded-circle flex-shrink-0"></span>
                        ${newStatus == '1' ? 'Approved' : 'Not Approved'}
                    `;
                    button.setAttribute('data-current-status', newStatus);
                    button.textContent = newStatus == '1' ? 'Unapprove' : 'Approve';
                    button.className = `bg-main-50 text-main-600 py-2 px-14 rounded-pill hover-bg-main-600 hover-text-white toggle-status-btn`;
                } else {
                    alert('Failed to update status: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the status.');
            });
        }
    </script>
@endsection