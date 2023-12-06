<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel" style="height: 100vh;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (Route::currentRouteName() == 'admin.dashboard') active @endif"
                        aria-current="page" href="{{ route('admin.dashboard') }}">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (Route::currentRouteName() == 'admin.doctors.index') active @endif"
                        href="{{ route('admin.doctors.index') }}">
                        <svg class="bi">
                            <use xlink:href="#file-earmark" />
                        </svg>
                        Doctors
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (Route::currentRouteName() == 'admin.patients.index') active @endif"
                        href="{{ route('admin.patients.index') }}">
                        <svg class="bi">
                            <use xlink:href="#cart" />
                        </svg>
                        Patients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="">
                        <svg class="bi">
                            <use xlink:href="#people" />
                        </svg>
                        Appoitment
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 " href="#">
                        <svg class="bi">
                            <use xlink:href="#graph-up" />
                        </svg>
                        Prescriptions
                    </a>
                </li>
            </ul>

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Basic</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    <svg class="bi">
                        <use xlink:href="#arrow-90deg-left" />
                    </svg>
                </a>
            </h6>

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (Route::currentRouteName() == 'admin.designations.index') active @endif"
                        href="{{ route('admin.designations.index') }}">
                        <svg class="bi">
                            <use xlink:href="#puzzle" />
                        </svg>
                        Designation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (Route::currentRouteName() == 'admin.rooms.index') active @endif"
                        href="{{ route('admin.rooms.index') }}">
                        <svg class="bi">
                            <use xlink:href="#app" />
                        </svg>
                        Rooms
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (Route::currentRouteName() == 'admin.beds.index') active @endif"
                        href="{{ route('admin.beds.index') }}">
                        <svg class="bi">
                            <use xlink:href="#segmented-nav" />
                        </svg>
                        Beds
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (Route::currentRouteName() == 'admin.services.index') active @endif"
                        href="{{ route('admin.services.index') }}">
                        <svg class="bi">
                            <use xlink:href="#database" />
                        </svg>
                        Service
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (Route::currentRouteName() == 'admin.medicines.index') active @endif"
                        href="{{ route('admin.medicines.index') }}">
                        <svg class="bi">
                            <use xlink:href="#capsule" />
                        </svg>
                        Medicine
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (Route::currentRouteName() == 'admin.materials.index') active @endif"
                        href="{{ route('admin.materials.index') }}">
                        <svg class="bi">
                            <use xlink:href="#sliders2" />
                        </svg>
                        Materials
                    </a>
                </li>
            </ul>

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Saved reports</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    <svg class="bi">
                        <use xlink:href="#graph-up" />
                    </svg>
                </a>
            </h6>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <svg class="bi">
                            <use xlink:href="#file-earmark-text" />
                        </svg>
                        Current month
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <svg class="bi">
                            <use xlink:href="#file-earmark-text" />
                        </svg>
                        Last quarter
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <svg class="bi">
                            <use xlink:href="#file-earmark-text" />
                        </svg>
                        Year-end sale
                    </a>
                </li>
            </ul>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (Route::currentRouteName() == 'admin.profile') active @endif"
                        href="{{ route('admin.profile') }}">
                        <svg class="bi">
                            <use xlink:href="#person" />
                        </svg>
                        Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <svg class="bi">
                            <use xlink:href="#gear-wide-connected" />
                        </svg>
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('admin.logout') }}">
                        <svg class="bi">
                            <use xlink:href="#box-arrow-right" />
                        </svg>
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
