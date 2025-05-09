<aside class="sidebar">
    <button type="button"
        class="sidebar-close-btn text-gray-500 hover-text-white hover-bg-main-600 text-md w-24 h-24 border border-gray-100 hover-border-main-600 d-xl-none d-flex flex-center rounded-circle position-absolute"><i
            class="ph ph-x"></i></button>
    <a href="{{route('admin.dashboard')}}"
        class="sidebar__logo text-center p-20 position-sticky inset-block-start-0 bg-white w-100 z-1 pb-10">
        <img src="{{url('admin/assets/images/logo/careercracker.png')}}" alt="Logo">
    </a>

    <div class="sidebar-menu-wrapper overflow-y-auto scroll-sm">
        <div class="p-20 pt-10">
            <ul class="sidebar-menu">
                <li class="sidebar-menu__item ">
                    <a href="{{route('admin.dashboard')}}" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-squares-four"></i></span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-menu__item has-dropdown">
                    <a href="javascript:void(0)" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-graduation-cap"></i></span>
                        <span class="text">Courses</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="{{ route('admin.courses.index') }}" class="sidebar-submenu__link">All Courses</a>
                        </li>

                        <li class="sidebar-submenu__item">
                            <a href="{{ route('admin.categories.index') }}" class="sidebar-submenu__link">All
                                Categories</a>
                        </li>
                        <li class="sidebar-submenu__item">
                            <a href="{{ route('admin.subcategories.index') }}" class="sidebar-submenu__link">All Sub
                                Category</a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-menu__item has-dropdown">
                    <a href="javascript:void(0)" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-users-three"></i></span>
                        <span class="text">Students</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="{{ route('admin.students.index') }}" class="sidebar-submenu__link">All Students</a>
                        </li>
                        <li class="sidebar-submenu__item">
                            <a href="{{ route('admin.students.create') }}" class="sidebar-submenu__link">Add New
                                Student</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu__item has-dropdown">
                    <a href="javascript:void(0)" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-users-three"></i></span>
                        <span class="text">Language</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="{{route('admin.language.index')}}" class="sidebar-submenu__link">All Language</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu__item has-dropdown">
                    <a href="javascript:void(0)" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-users-three"></i></span>
                        <span class="text">Faculty</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="{{route('admin.faculties.index')}}" class="sidebar-submenu__link">All Faculty </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu__item has-dropdown">
                    <a href="javascript:void(0)" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-users-three"></i></span>
                        <span class="text">Orders</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="{{route('admin.orders.all_orders')}}" class="sidebar-submenu__link">All Orders </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-menu__item has-dropdown">
                    <a href="javascript:void(0)" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-users-three"></i></span>
                        <span class="text">Blog</span>
                    </a>
                    <!-- Submenu start -->
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="{{route('admin.blogs.index')}}" class="sidebar-submenu__link">All Blogs </a>
                        </li>
                    </ul>
                    <!-- Submenu End -->
                </li>

                <li class="sidebar-menu__item has-dropdown">
                    <a href="javascript:void(0)" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-users-three"></i></span>
                        <span class="text">Testimonials</span>
                    </a>
                    <!-- Submenu start -->
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="{{route('admin.testimonials.index')}}"
                                class="sidebar-submenu__link">Testimonials</a>
                        </li>
                    </ul>
                    <!-- Submenu End -->
                </li>

                <li class="sidebar-menu__item has-dropdown">
                    <a href="javascript:void(0)" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-stack"></i></span>
                        <span class="text">Batch</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="{{route('admin.batchs.index')}}" class="sidebar-submenu__link">All Batch </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="sidebar-menu__item has-dropdown">
                    <a href="javascript:void(0)" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-broadcast"></i></span>
                        <span class="text">Live Class</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="all-live-class.php" class="sidebar-submenu__link">All Live Class </a>
                        </li>
                        <li class="sidebar-submenu__item">
                            <a href="add-live-class.php" class="sidebar-submenu__link"> Add Live Class </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="sidebar-menu__item has-dropdown">
                    <a href="javascript:void(0)" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-chat-circle-text"></i></span>
                        <span class="text">Review</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="{{ route('admin.reviews.index') }}" class="sidebar-submenu__link">All Review</a>
                        </li>
                        <li class="sidebar-submenu__item">
                            <a href="{{ route('admin.reviews.create') }}" class="sidebar-submenu__link">Add Review</a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="sidebar-menu__item has-dropdown">
                    <a href="javascript:void(0)" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-calendar-dots"></i></span>
                        <span class="text">Events</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="all-events.php" class="sidebar-submenu__link">All Events </a>
                        </li>
                        <li class="sidebar-submenu__item">
                            <a href="#" class="sidebar-submenu__link"> Add Events </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="sidebar-menu__item has-dropdown">
                    <a href="javascript:void(0)" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-suitcase"></i></span>
                        <span class="text">Careers & Other</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="{{route('admin.career.index')}}" class="sidebar-submenu__link">Career</a>
                        </li>
                        <li class="sidebar-submenu__item">
                            <a href="{{ route('admin.enquiry.view') }}" class="sidebar-submenu__link">Enquiry</a>
                        </li>

                        <li class="sidebar-submenu__item">
                            <a href="{{ route('admin.news_letters.newsLetter') }}" class="sidebar-submenu__link">News
                                Letters</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-menu__item">
                    <span
                        class="text-gray-300 text-sm px-20 pt-20 fw-semibold border-top border-gray-100 d-block text-uppercase">Settings</span>
                </li>
                <li class="sidebar-menu__item">
                    <a href="{{ route('admin.profile') }}" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-gear"></i></span>
                        <span class="text">Account Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>