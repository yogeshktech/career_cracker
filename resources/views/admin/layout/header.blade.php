<div class="top-navbar flex-between gap-16">

    <div class="flex-align gap-16">
        <!-- Toggle Button Start -->
        <button type="button" class="toggle-btn d-xl-none d-flex text-26 text-gray-500"><i
                class="ph ph-list"></i></button>
        <!-- Toggle Button End -->
    </div>

    <div class="flex-align gap-16">
        <div class="flex-align gap-8">
        </div>
        <!-- User Profile Start -->
        <div class="dropdown">
            <button
                class="users arrow-down-icon border border-gray-200 rounded-pill p-4 d-inline-block pe-40 position-relative"
                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="position-relative">
                    <img src="assets/images/thumbs/user-img.png" alt="Image" class="h-32 w-32 rounded-circle">
                    <span
                        class="activation-badge w-8 h-8 position-absolute inset-block-end-0 inset-inline-end-0"></span>
                </span>
            </button>
            <div class="dropdown">
                <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                    <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                        @if(Auth::guard('admin')->check())
                            <div class="card-body">
                                <div class="flex-align gap-8 mb-20 pb-20 border-bottom border-gray-100">
                                    @php
                                        $admin = Auth::guard('admin')->user();
                                        $imagePath = $admin && $admin->email ? asset('uploads/admins/' . $admin->profile_image) : asset('admin/assets/images/thumbs/user-img.pnged');
                                    @endphp

                                    <img src="{{ $imagePath }}" alt="Profile" class="w-54 h-54 rounded-circle">

                                    <div>
                                        <h4 class="mb-0">{{ $admin->name }}</h4>
                                        <p class="fw-medium text-13 text-gray-200">{{ $admin->email }}</p>
                                    </div>
                                </div>

                                <ul class="max-h-270 overflow-y-auto scroll-sm pe-4">
                                    <li class="mb-4">
                                        <a href="{{ route('admin.profile') }}"
                                            class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                            <span class="text-2xl text-primary-600 d-flex"><i class="ph ph-gear"></i></span>
                                            <span class="text">Account Settings</span>
                                        </a>
                                    </li>

                                    <li class="pt-8 border-top border-gray-100">
                                        <form method="POST" action="{{ route('admin.logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="py-12 text-15 px-20 hover-bg-danger-50 text-gray-300 hover-text-danger-600 rounded-8 flex-align gap-8 fw-medium text-15 w-100 text-start">
                                                <span class="text-2xl text-danger-600 d-flex"><i
                                                        class="ph ph-sign-out"></i></span>
                                                <span class="text">Log Out</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- User Profile Start -->

    </div>
</div>