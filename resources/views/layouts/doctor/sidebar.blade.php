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
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'doctor.dashboard') active @endif" aria-current="page"
                        href="{{ route('doctor.dashboard') }}">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'doctor.patients.index') active @endif" href="{{ route('doctor.patients.index') }}">
                        <svg class="bi">
                            <use xlink:href="#cart" />
                        </svg>
                        Patients
                    </a>
                </li>
        
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'doctor.appoitments.index') active @endif" href="{{ route('doctor.appoitments.index') }}">
                        <svg class="bi">
                            <use xlink:href="#people" />
                        </svg>
                        Appoitments
                    </a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'doctor.prescriptions.index') active @endif" href="{{ route('doctor.prescriptions.index') }}">
                        <svg class="bi">
                            <use xlink:href="#graph-up" />
                        </svg>
                        Prescriptions
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'doctor.schedules.index') active @endif" href="{{ route('doctor.schedules.index') }}">
                        <svg class="bi">
                            <use xlink:href="#table" />
                        </svg>
                        Schedules
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if (Route::currentRouteName() == 'doctor.medicines.index') active @endif"
                        href="{{ route('doctor.medicines.index') }}">
                        <svg class="bi">
                            <use xlink:href="#capsule" />
                        </svg>
                        Medicine
                    </a>
                </li>
            </ul>

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Notifications</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    <b class="text-success">{{ count(unread_notification(auth()->id(), 'Doctor')) }}</b>
                </a>
            </h6>

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'doctor.notifications') active @endif" href="{{ route('doctor.notifications') }}">
                        <svg class="bi">
                            <use xlink:href="#file-earmark-text" />
                        </svg>
                       Messages
                    </a>
                </li>
                {{-- <li class="nav-item">
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
                </li> --}}
            </ul>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'doctor.profile') active @endif" href="{{ route('doctor.profile') }}">
                        <svg class="bi">
                            <use xlink:href="#person" />
                        </svg>
                        Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('doctor.logout') }}">
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
