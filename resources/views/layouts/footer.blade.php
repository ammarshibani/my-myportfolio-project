<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h3 class="mb-3">AMMAR Y. ALSHIBANI</h3>
                <p>Information Systems Student | Full Stack Developer | IT Specialist</p>
                <div class="social-icons mt-3">
                    <a href="#" class="me-3"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-github"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                    <a href="mailto:yammar673@gmail.com"><i class="fas fa-envelope"></i></a>
                </div>
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0">
                <h4 class="mb-3">Quick Links</h4>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('home') }}">Home</a></li>
                    <li class="mb-2"><a href="{{ route('skills') }}">Skills</a></li>
                    <li class="mb-2"><a href="{{ route('projects') }}">Projects</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}">About</a></li>
                    <li class="mb-2"><a href="{{ route('certificates') }}">Certificates</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-4">
                <h4 class="mb-3">Contact Info</h4>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Taiz, Yemen</li>
                    <li class="mb-2"><i class="fas fa-phone me-2"></i> +967 777 138 338</li>
                    <li class="mb-2"><i class="fas fa-message me-2"></i> +967 737 138 338</li>
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> yammar673@gmail.com</li>
                </ul>
            </div>
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="mb-0">© {{ date('Y') }} Ammar Y. Alshibani. All rights reserved.</p>
        </div>
    </div>
</footer>