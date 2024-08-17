<footer class="footer-section footer" style="background-image: url({{ asset('frontend-assets') }}/images/backgrounds/footer2.png); ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4 mb-lg-0 d-flex flex-column justify-content-center align-center">
                <!-- logo -->
                <a href="index.html" class="text-center logo">
                    <img class="img-fluid" src="{{ asset($siteSettings->logo) }}" alt="logo" width="15%">
                </a>
                <ul class="list-inline text-lg-right text-center footer-menu text-white mt-5 mb-3">
                    <li class="list-inline-item active mb-2"><i class="fa-solid fa-envelope" style="padding: 10px; background: cadetblue; border-radius: 50%;"></i> {{ $siteSettings->email }}</li>
                    <li class="list-inline-item"><i class="fa-solid fa-phone" style="padding: 10px; background: cadetblue; border-radius: 50%;"></i> {{ $siteSettings->phone }}</li>
                </ul>
                <ul class="list-inline text-lg-right text-center footer-menu text-white mb-3">
                    <li class="list-inline-item active"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li class="list-inline-item"><a class="page-scroll text-white" href="{{ route('about') }}">About</a></li>
                    <li class="list-inline-item"><a href="{{ route('services') }}" class="text-white">Services</a></li>
                    <li class="list-inline-item"><a class="page-scroll text-white" href="{{ route('projects') }}">Projects</a></li>
                    <li class="list-inline-item"><a class="page-scroll text-white" href="{{ route('home') }}/#pricing">Pricing</a></li>
                    <li class="list-inline-item"><a class="text-white" href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <ul class="list-inline text-lg-right text-center social-icon">
                    <li class="list-inline-item">
                        <a class="facebook" href="{{ $siteSettings->facebook }}"><i class="ti-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="linkedin" href="{{ $siteSettings->linkdin }}"><i class="ti-linkedin"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="black" href="https://wa.me/{{ str_replace(['+', '-', ' '], '', $siteSettings->whatsapp) }}"><i class="fa-brands fa-whatsapp" style="color: #00991f;"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="black" href="{{ $siteSettings->github }}"><i class="fa-brands fa-github"></i></a>
                    </li>
                </ul>
                <p class="text-center mt-5"><i class="fa-regular fa-copyright"></i> Copywrite by SoftDivz <span id="year"></span> .</p>
            </div>
        </div>
    </div>
</footer>
<script>
    const currentYear = new Date().getFullYear();
    const displayYear = currentYear > 2023 ? `2023-${currentYear}` : '2023';
    document.getElementById('year').textContent = displayYear;
  </script>
