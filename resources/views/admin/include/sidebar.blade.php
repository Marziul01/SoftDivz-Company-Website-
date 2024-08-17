<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i><span class="nav-text">Projects</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('project.index') }}">Software's</a></li>
                    <li><a href="{{ route('project.create') }}">Websites</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('services.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Services</span>
                </a>
            </li>
            <li>
                <a href="{{ route('testimonials.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Testimonials</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pricings.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Pricings</span>
                </a>
            </li>
            <li>
                <a href="{{ route('clients.index') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Clients</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i><span class="nav-text">Hirings</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.plans') }}">Bought Plans</a></li>
                    <li><a href="{{ route('admin.hire') }}">Filled Hire Form</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('siteSettings') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Site Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>
