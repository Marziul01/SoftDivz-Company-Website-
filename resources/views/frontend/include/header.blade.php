<section class="fixed-top navigation">
    <div class="container normalHeader">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logosDiv" href="index.html"><img src="{{ asset('frontend-assets') }}/images/lg.png" alt="logo" width="60%"></a>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- navbar -->
            <div class="collapse navbar-collapse text-center" id="navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#feature">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.html">Services</a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link page-scroll" href="#team">Team</a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary ml-lg-3 primary-shadow mobileButton">Try us Now!</a>
            </div>
        </nav>
    </div>
</section>
