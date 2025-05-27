
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">AMMAR Y. ALSHIBANI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
            
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('skills') ? 'active' : '' }}" href="{{ route('skills') }}">Skills</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('projects') ? 'active' : '' }}" href="{{ route('projects') }}">Projects</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('certificates') ? 'active' : '' }}" href="{{ route('certificates') }}">Certificates</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
            </ul>
             <!-- Language Switcher -->
{{-- <button class="btn btn-sm btn-outline-secondary language-switcher" 
        data-locale="{{ app()->getLocale() == 'en' ? 'ar' : 'en' }}">
    <i class="fas fa-language"></i> 
    {{ app()->getLocale() == 'en' ? 'العربية' : 'English' }}
</button>
             --}}
{{-- <div class="form-check form-switch me-3">
    <input class="form-check-input" type="checkbox" id="darkModeToggle"
        {{ session('theme', 'light') === 'dark' ? 'checked' : '' }}>
    <label class="form-check-label" for="darkModeToggle">
        <i class="fas fa-{{ session('theme', 'light') === 'dark' ? 'sun' : 'moon' }}" id="themeIcon"></i>
    </label>
</div>

            <!-- Theme Switcher -->
            <button class="btn btn-sm btn-outline-secondary theme-switcher">
                <i class="fas fa-{{ session('theme', 'light') == 'dark' ? 'sun' : 'moon' }}"></i>
                {{ session('theme', 'light') == 'dark' ? __('Light Mode') : __('Dark Mode') }}
            </button>
        </div> --}}
            <!-- Language Switcher -->
                {{-- <button class="language-switcher" data-locale="{{ app()->getLocale() == 'en' ? 'ar' : 'en' }}">
                    <span class="language-text">{{ app()->getLocale() == 'en' ? 'العربية' : 'English' }}</span>
                    <i class="fas fa-globe"></i>
                </button> --}}
                
            <div class="d-flex align-items-center">
                <div class="form-check form-switch me-3">
                    <input class="form-check-input" type="checkbox" id="darkModeToggle" 
                        {{ session('theme', 'light') === 'dark' ? 'checked' : '' }}>
                    <label class="form-check-label" for="darkModeToggle">
                        <i class="fas fa-{{ session('theme', 'light') === 'dark' ? 'sun' : 'moon' }}" id="themeIcon"></i>
                    </label>
                </div>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

        </div>
    </div>
</nav>

