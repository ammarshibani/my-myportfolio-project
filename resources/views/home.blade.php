@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    
    <section class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 order-md-1 order-2">
                    <h1 class="display-4 fw-bold mb-3">{{ $profile->full_name_en }}</h1>
                    <p class="lead mb-4">{{ $profile->about_en }}</p>
                    <div class="d-flex gap-3">
                        <a href="#contact" class="btn btn-primary btn-lg">{{ __('Contact Me') }}</a>
                        <a href="#projects" class="btn btn-outline-secondary btn-lg">{{ __('View Projects') }}</a>
                    </div>
                </div>
                <div class="col-md-6 order-md-2 order-1 mb-4 mb-md-0 text-center">
                    @if($profile->photo)
                        <img src="{{ asset('storage/' . $profile->photo) }}" alt="Profile Photo" class="img-fluid rounded-circle profile-photo">
                    @else
                        <div class="profile-placeholder rounded-circle">
                            <i class="fas fa-user"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">{{ __('About Me') }}</h2>
            <div class="row">
                <div class="col-lg-6">
                    <h3>{{ __('Personal Info') }}</h3>
                    <ul class="list-unstyled">
                        <li><strong>{{ __('Name') }}:</strong> {{ $profile->full_name_en }}</li>
                        <li><strong>{{ __('Email') }}:</strong> {{ $profile->email }}</li>
                        <li><strong>{{ __('Phone') }}:</strong> {{ $profile->phone }}</li>
                        <li><strong>{{ __('WhatsApp') }}:</strong> {{ $profile->whatsapp }}</li>
                        <li><strong>{{ __('Address') }}:</strong> {{ $profile->address_en }}</li>
                        <li><strong>{{ __('Birth Date') }}:</strong> 
                            @if($profile->birth_date)
                                {{ \Carbon\Carbon::parse($profile->birth_date)->format('F j, Y') }}
                            @else
                                N/A
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <h3>{{ __('Bio') }}</h3>
                    <p>{{ $profile->about_en }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">{{ __('My Skills') }}</h2>
            <div class="row">
                @foreach($skills->groupBy('category') as $category => $categorySkills)
                    <div class="col-md-6 mb-4">
                        <h3 class="mb-4">{{ $category }}</h3>
                        @foreach($categorySkills as $skill)
                            <div class="skill-item mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>{{ $skill->name_en }}</span>
                                    <span>{{ $skill->percentage }}%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $skill->percentage }}%" 
                                        aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">{{ __('My Projects') }}</h2>
            <div class="row g-4">
                @foreach($projects as $project)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="{{ $project->title_en }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title_en }}</h5>
                                <p class="card-text">{{ $project->description_en }}</p>
                                <div class="mb-3">
                                    <small class="text-muted">{{ __('Technologies') }}: {{ $project->technologies }}</small>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="{{ $project->link }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                    {{ __('View Project') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Education Section -->
    <section id="education" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">{{ __('Education') }}</h2>
            <div class="timeline">
                @foreach($educations as $education)
                    <div class="timeline-item">
                        <div class="timeline-date">{{ $education->start_date->format('Y') }} - 
                            {{ $education->end_date ? $education->end_date->format('Y') : __('Present') }}</div>
                        <div class="timeline-content">
                            <h3>{{ $education->degree_en }}</h3>
                            <h4>{{ $education->institution_en }}</h4>
                            <p>{{ $education->description_en }}</p>
                            @if($education->grade)
                                <span class="badge bg-primary">{{ $education->grade }}</span>
                            @endif
                            @if($education->position)
                                <span class="badge bg-success">{{ __('Rank') }}: {{ $education->position }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">{{ __('Contact Me') }}</h2>
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="contact-info">
                        <h3 class="mb-4">{{ __('Get in Touch') }}</h3>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-envelope me-2"></i> {{ $profile->email }}
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-phone me-2"></i> {{ $profile->phone }}
                            </li>
                            <li class="mb-3">
                                <i class="fab fa-whatsapp me-2"></i> {{ $profile->whatsapp }}
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i> {{ $profile->address_en }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="{{ __('Your Name') }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="{{ __('Your Email') }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="subject" placeholder="{{ __('Subject') }}" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="{{ __('Your Message') }}" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Send Message') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection