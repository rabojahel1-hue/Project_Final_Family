<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <i class="fas fa-hospital-user brand-image img-circle elevation-3 mt-1 ml-3"></i>
        <span class="brand-text font-weight-light">Family Doctor</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex border-bottom border-secondary align-items-center">
            <div class="image">
                @php
                    $malePath = asset('dashboard_assets/dist/img/male-snap.png');
                    $femalePath = asset('dashboard_assets/dist/img/female-snap.png');

                    if (auth()->check() && auth()->user()->image) {
                        $userImage = asset('storage/' . auth()->user()->image);
                    } else {
                        $userImage = auth()->check() && auth()->user()->gender == 'female' ? $femalePath : $malePath;
                    }
                @endphp

                <img src="{{ $userImage }}" class="img-circle elevation-2"
                    style="width: 40px; height: 40px; object-fit: cover; border: 1.5px solid #4f5962;" alt="User"
                    onerror="this.src='{{ asset('dashboard_assets/dist/img/avatar5.png') }}'">
            </div>
            <div class="info">
                <a href="#" class="d-block ml-2 font-weight-600" style="color: #c2c7d0;">
                    {{ auth()->user()->name ?? 'Administrator' }}
                </a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard Home</p>
                    </a>
                </li>

                <li class="nav-header text-muted font-weight-bold mt-2">ADMINISTRATION</li>
                <li class="nav-item {{ Request::is('*users*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('*users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User Management <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="nav-link {{ Request::is('*/users') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.create') }}"
                                class="nav-link {{ Request::is('*/users/create') ? 'active' : '' }}">
                                <i class="far fa-plus-square nav-icon text-warning"></i>
                                <p>Add New User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.trash') }}"
                                class="nav-link {{ Request::is('*/users/trash') ? 'active' : '' }}">
                                <i class="fas fa-trash-alt nav-icon text-danger"></i>
                                <p>Users Trash</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header text-muted font-weight-bold mt-2">MEDICAL MANAGEMENT</li>

                <li class="nav-item {{ Request::is('*doctors*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('*doctors*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>Doctors <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.doctors.index') }}"
                                class="nav-link {{ Request::is('*/doctors') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Doctors List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.doctors.create') }}"
                                class="nav-link {{ Request::is('*/doctors/create') ? 'active' : '' }}">
                                <i class="far fa-plus-square nav-icon text-success"></i>
                                <p>Add New Doctor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.doctors.trash') }}"
                                class="nav-link {{ Request::is('*/doctors/trash') ? 'active' : '' }}">
                                <i class="fas fa-trash-alt nav-icon text-danger"></i>
                                <p>Doctors Trash</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::is('*team*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('*team*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Teams <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.team.index') }}"
                                class="nav-link {{ Request::is('*/team') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Teams</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.team.create') }}"
                                class="nav-link {{ Request::is('*/team/create') ? 'active' : '' }}">
                                <i class="far fa-plus-square nav-icon text-info"></i>
                                <p>Add New Teams</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.team.trash') }}"
                                class="nav-link {{ Request::is('*/team/trash') ? 'active' : '' }}">
                                <i class="fas fa-trash-alt nav-icon text-danger"></i>
                                <p>Teams Trash</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-header">MANAGEMENT</li>

                <li class="nav-item {{ Request::is('*services*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('*services*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase-medical"></i>
                        <p>Medical Services <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.services.index') }}"
                                class="nav-link {{ Request::is('*/services') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.services.create') }}"
                                class="nav-link {{ Request::is('*/services/create') ? 'active' : '' }}">
                                <i class="far fa-plus-square nav-icon text-info"></i>
                                <p>Add New Service</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.services.trash') }}"
                                class="nav-link {{ Request::is('*/services/trash') ? 'active' : '' }}">
                                <i class="fas fa-trash-alt nav-icon text-danger"></i>
                                <p>Services Trash</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::is('*bookings*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('*bookings*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Bookings <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.bookings.index') }}"
                                class="nav-link {{ Request::is('*/bookings') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Bookings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.bookings.create') }}"
                                class="nav-link {{ Request::is('*/bookings/create') ? 'active' : '' }}">
                                <i class="far fa-plus-square nav-icon text-info"></i>
                                <p>Add New Bookings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.bookings.trash') }}"
                                class="nav-link {{ Request::is('*/bookings/trash') ? 'active' : '' }}">
                                <i class="fas fa-trash-alt nav-icon text-danger"></i>
                                <p>Bookings Trash</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item {{ Request::is('*testimonials*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('*testimonials*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comment-medical"></i>
                        <p>Testimonials <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.testimonials.index') }}"
                                class="nav-link {{ Request::is('*/testimonials') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Testimonials</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.testimonials.create') }}"
                                class="nav-link {{ Request::is('*/testimonials/create') ? 'active' : '' }}">
                                <i class="far fa-plus-square nav-icon text-info"></i>
                                <p>Add New Testimonials</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.testimonials.trash') }}"
                                class="nav-link {{ Request::is('*/testimonials/trash') ? 'active' : '' }}">
                                <i class="fas fa-trash-alt nav-icon text-danger"></i>
                                <p>Testimonials Trash</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::is('*social-links*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('*social-links*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-share-alt"></i>
                        <p>Social Links <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.social-links.index') }}"
                                class="nav-link {{ Request::is('*/social-links') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Social Links</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.social-links.create') }}"
                                class="nav-link {{ Request::is('*/social-links/create') ? 'active' : '' }}">
                                <i class="far fa-plus-square nav-icon text-info"></i>
                                <p>Add New Link</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.subscribers.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('admin.subscribers.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>
                            Subscribers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.subscribers.index') }}"
                                class="nav-link {{ request()->routeIs('admin.subscribers.index') ? 'active' : '' }}">
                                <i class="fas fa-list nav-icon"></i>
                                <p>All Subscribers</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.subscribers.create') }}"
                                class="nav-link {{ request()->routeIs('admin.subscribers.create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon text-success"></i>
                                <p>Add New</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.subscribers.trash') }}"
                                class="nav-link {{ request()->routeIs('admin.subscribers.trash') ? 'active' : '' }}">
                                <i class="fas fa-trash-alt nav-icon text-danger"></i>
                                <p>Trash Bin</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.contact_messages.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('admin.contact_messages.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Contact Messages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.contact_messages.index') }}"
                                class="nav-link {{ request()->routeIs('admin.contact_messages.index') ? 'active' : '' }}">
                                <i class="fas fa-inbox nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.contact_messages.create') }}"
                                class="nav-link {{ request()->routeIs('admin.contact_messages.create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon text-success"></i>
                                <p>Create Message</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.contact_messages.trash') }}"
                                class="nav-link {{ request()->routeIs('admin.contact_messages.trash') ? 'active' : '' }}">
                                <i class="fas fa-trash-alt nav-icon text-danger"></i>
                                <p>Trash</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->routeIs('admin.schedules.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.schedules.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Schedules
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.schedules.index') }}"
                                class="nav-link {{ request()->routeIs('admin.schedules.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>View All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.schedules.create') }}"
                                class="nav-link {{ request()->routeIs('admin.schedules.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Appointments</p>
                    </a>
                </li> --}}

                <li class="nav-header text-muted font-weight-bold mt-2">ACCOUNT</li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-danger"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
