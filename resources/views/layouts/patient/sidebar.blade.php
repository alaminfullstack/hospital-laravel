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
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'patient.dashboard') active @endif" aria-current="page"
                        href="{{ route('patient.dashboard') }}">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        Dashboard
                    </a>
                </li>
        
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'patient.appoitments.index') active @endif" href="{{ route('patient.appoitments.index') }}">
                        <svg class="bi">
                            <use xlink:href="#people" />
                        </svg>
                        Appoitment
                    </a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'patient.prescriptions.index') active @endif" href="{{ route('patient.prescriptions.index') }}">
                        <svg class="bi">
                            <use xlink:href="#graph-up" />
                        </svg>
                        Prescriptions
                    </a>
                </li>
            </ul>

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Notifications</span>
                <a class="" href="#" aria-label="Notifications">
                    <b class="text-success">{{ count(unread_notification(auth()->id(), 'Patient')) }}</b>
                </a>
            </h6>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'patient.notifications') active @endif" href="{{ route('patient.notifications') }}">
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
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'patient.attachments') active @endif" href="{{ route('patient.attachments') }}">
                        <svg class="bi">
                            <use xlink:href="#person" />
                        </svg>
                        Attachments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'patient.profile') active @endif" href="{{ route('patient.profile') }}">
                        <svg class="bi">
                            <use xlink:href="#person" />
                        </svg>
                        Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('patient.logout') }}">
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
