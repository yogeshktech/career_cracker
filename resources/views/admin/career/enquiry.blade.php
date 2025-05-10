@extends('admin.layout.layout')
@section('content')
    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('admin.dashboard') }}"
                            class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">All Enquiry</span></li>
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
                @if ($enqueries->isEmpty())
                    <p class="text-center p-4">No enquiries found.</p>
                @else
                    <table id="enquiryTable" class="table table-striped" 
                           data-toggle="table" 
                           data-search="true" 
                           data-pagination="true" 
                           data-page-size="10" 
                           data-sortable="true" 
                           data-show-columns="true" 
                           data-show-refresh="true" 
                           data-click-to-select="true" 
                           >
                        <thead>
                            <tr>
                                <th data-sortable="true" data-field="name" class="h6 text-gray-300">Name</th>
                                <th data-sortable="true" data-field="email" class="h6 text-gray-300">Email</th>
                                <th data-sortable="true" data-field="phone" class="h6 text-gray-300">Mobile</th>
                                <th data-field="message" class="h6 text-gray-300">Message</th>
                                <th data-field="actions" class="h6 text-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enqueries as $enquiry)
                                <tr>
                                    <td>
                                        <span class="h6 mb-0 fw-medium text-gray-300">{{ $enquiry->name }}</span>
                                    </td>
                                    <td>
                                        <span class="h6 mb-0 fw-medium text-gray-300">{{ $enquiry->email }}</span>
                                    </td>
                                    <td>
                                        <span class="h6 mb-0 fw-medium text-gray-300">{{ $enquiry->phone }}</span>
                                    </td>
                                    <td>
                                        <span class="h6 mb-0 fw-medium text-gray-300">{{ $enquiry->message }}</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.enquiry.delete', $enquiry->id) }}" method="POST"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-danger-50 text-danger-600 py-2 px-14 rounded-pill hover-bg-danger-600 hover-text-white"
                                                    onclick="return confirm('Are you sure you want to delete this enquiry?')">Delete</button>
                                        </form>
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