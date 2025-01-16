<section class="fixed-top navigation">
    <div class="container normalHeader">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logosDiv" href="{{ route('home') }}"><img src="{{ asset($siteSettings->logo) }}" alt="logo" width="50%" class="pl-2"></a>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- navbar -->
            <div class="collapse navbar-collapse text-center" id="navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : ''  }}" >
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'about' ? 'active' : ''  }}">
                        <a class="nav-link page-scroll" href="{{ route('about') }}">About us</a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'projects' ? 'active' : ''  }}">
                        <a class="nav-link" href="{{ route('projects') }}">Projects</a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'services' ? 'active' : ''  }}">
                        <a class="nav-link" href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'home/#pricing' ? 'active' : ''  }}">
                        <a class="nav-link page-scroll" href="{{ route('home') }}/#pricing">Pricing</a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'contact' ? 'active' : ''  }}">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <a href="{{ route('hire') }}" class="btn btn-primary ml-lg-3 primary-shadow mobileButton">Hire Us!</a>
            </div>
        </nav>
    </div>
</section>
