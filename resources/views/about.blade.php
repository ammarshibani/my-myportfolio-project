@extends('layouts.app')

@section('title', __('About Me'))

@section('content')
<section class="about-section py-5">
    <div class="container">
        <!-- Hero Section -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-3">{{ __('About Me') }}</h1>
                <p class="lead mb-4">{{ $profile->about_en }}</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#experience" class="btn btn-primary btn-lg">{{ __('My Experience') }}</a>
                    <a href="#education" class="btn btn-outline-primary btn-lg">{{ __('My Education') }}</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                @if($profile->photo)
                    <img src="{{ asset('storage/' . $profile->photo) }}" alt="Profile Photo" class="img-fluid rounded-circle profile-photo shadow-lg">
                @else
                    <div class="profile-placeholder rounded-circle shadow-lg">
                        <i class="fas fa-user"></i>
                    </div>
                @endif
            </div>
        </div>

        <!-- Personal Info -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="h4 mb-4">{{ __('Personal Information') }}</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3"><strong>{{ __('Full Name') }}:</strong> {{ $profile->full_name_en }}</li>
                                    <li class="mb-3"><strong>{{ __('Email') }}:</strong> {{ $profile->email }}</li>
                                    <li class="mb-3"><strong>{{ __('Phone') }}:</strong> {{ $profile->phone }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3"><strong>{{ __('WhatsApp') }}:</strong> {{ $profile->whatsapp }}</li>
                                    <li class="mb-3"><strong>{{ __('Address') }}:</strong> {{ $profile->address_en }}</li>
                        <li><strong>{{ __('Birth Date') }}:</strong> 
                            @if($profile->birth_date)
                                {{ \Carbon\Carbon::parse($profile->birth_date)->format('F j, Y') }}
                            @else
                                N/A
                            @endif
                        </li>
                                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Experience Section -->
        <section id="experience" class="mb-5">
            <h2 class="text-center mb-5 section-title">{{ __('Work Experience') }}</h2>
            <div class="timeline-experience">
                @foreach($experiences as $experience)
                    <div class="timeline-item">
                        <div class="timeline-date">{{ $experience->start_date->format('M Y') }} - {{ $experience->end_date ? $experience->end_date->format('M Y') : __('Present') }}</div>
                        <div class="timeline-content">
                            <h3>{{ $experience->position_en }}</h3>
                            <h4 class="text-primary">{{ $experience->company_en }}</h4>
                            <div class="experience-description">
                                {!! nl2br(e($experience->description_en)) !!}
                            </div>
                            <div class="experience-skills mt-2">
                                @if($experience->technologies)
                                    @foreach(explode(',', $experience->technologies) as $tech)
                                        <span class="badge bg-secondary">{{ trim($tech) }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Education Section -->
        <section id="education" class="mb-5">
            <h2 class="text-center mb-5 section-title">{{ __('Education') }}</h2>
            <div class="row">
                @foreach($educations as $education)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h3 class="h5">{{ $education->degree_en }}</h3>
                                <h4 class="h6 text-primary">{{ $education->institution_en }}</h4>
                                <div class="education-meta d-flex justify-content-between mb-3">
                                    <span class="text-muted">{{ $education->start_date->format('Y') }} - {{ $education->end_date ? $education->end_date->format('Y') : __('Present') }}</span>
                                    @if($education->grade)
                                        <span class="badge bg-success">{{ $education->grade }}</span>
                                    @endif
                                </div>
                                <p class="card-text">{{ $education->description_en }}</p>
                                @if($education->achievements)
                                    <div class="achievements mt-3">
                                        <h5 class="h6">{{ __('Achievements') }}:</h5>
                                        <ul>
                                            @foreach(explode("\n", $education->achievements) as $achievement)
                                                <li>{{ $achievement }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Skills Overview -->
        <section class="skills-overview mb-5">
            <h2 class="text-center mb-5 section-title">{{ __('Skills Overview') }}</h2>
            <div class="row">
                @foreach($skills->groupBy('category') as $category => $categorySkills)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h3 class="h5 mb-3">{{ $category }}</h3>
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
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Interests -->
        <section class="interests">
            <h2 class="text-center mb-5 section-title">{{ __('Interests') }}</h2>
            <div class="row text-center">
                @foreach($interests as $interest)
                    <div class="col-4 col-md-2 mb-4">
                        <div class="interest-item">
                            <div class="interest-icon mb-2">
                                <i class="{{ $interest['icon'] }} fa-3x"></i>
                            </div>
                            <div class="interest-name">{{ $interest['name'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</section>
@endsection