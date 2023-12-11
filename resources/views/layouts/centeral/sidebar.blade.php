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
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'centeral.dashboard') active @endif" aria-current="page"
                        href="{{ route('centeral.dashboard') }}">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'centeral.attachments.index') active @endif" aria-current="page"
                        href="{{ route('centeral.attachments.index') }}">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        Patient Attachments
                    </a>
                </li>
            </ul>

        
  
            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(Route::currentRouteName() == 'centeral.profile') active @endif" href="{{ route('centeral.profile') }}">
                        <svg class="bi">
                            <use xlink:href="#person" />
                        </svg>
                        Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('centeral.logout') }}">
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
