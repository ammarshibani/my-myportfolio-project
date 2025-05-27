@extends('layouts.app')

@section('title', __('My Skills'))

@section('content')
<section class="skills-section py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold">{{ __('My Skills') }}</h1>
                <p class="lead">{{ __('Browse through my technical skills and expertise') }}</p>
            </div>
        </div>

        <!-- Skills Filter -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="skills-filter text-center">
                    <button class="btn btn-outline-primary filter-btn active" data-filter="all">{{ __('All') }}</button>
                    @foreach($categories as $category)
                        <button class="btn btn-outline-primary filter-btn" data-filter="{{ Str::slug($category) }}">{{ $category }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Skills Grid -->
        <div class="row skills-grid">
            @foreach($skills as $skill)
                <div class="col-md-6 col-lg-4 mb-4 skill-item" data-category="{{ Str::slug($skill->category) }}">
                    <div class="card skill-card h-100">
                        <div class="card-body">
                            <div class="skill-header d-flex justify-content-between align-items-center mb-3">
                                <h3 class="h5 mb-0">{{ $skill->name_en }}</h3>
                                @if($skill->icon)
                                    <div class="skill-icon">
                                        <i class="{{ $skill->icon }} fa-2x"></i>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="skill-progress mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <small>{{ __('Proficiency') }}</small>
                                    <small>{{ $skill->percentage }}%</small>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                         role="progressbar" 
                                         style="width: {{ $skill->percentage }}%" 
                                         aria-valuenow="{{ $skill->percentage }}" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                            
                            <div class="skill-meta d-flex justify-content-between">
                                <span class="badge bg-primary">{{ $skill->category }}</span>
                                <button class="btn btn-sm btn-outline-secondary skill-details-btn" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#skillModal"
                                        data-name="{{ $skill->name_en }}"
                                        data-category="{{ $skill->category }}"
                                        data-percentage="{{ $skill->percentage }}"
                                        data-description="{{ $skill->description ?? 'No additional details available.' }}">
                                    <i class="fas fa-info-circle"></i> {{ __('Details') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Skill Comparison Chart -->
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center mb-4">{{ __('Skills Comparison') }}</h2>
                <div class="chart-container">
                    <canvas id="skillsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skill Details Modal -->
<div class="modal fade" id="skillModal" tabindex="-1" aria-labelledby="skillModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="skillModalLabel">{{ __('Skill Details') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>{{ __('Name') }}:</strong> <span id="modalSkillName"></span></p>
                        <p><strong>{{ __('Category') }}:</strong> <span id="modalSkillCategory"></span></p>
                        <p><strong>{{ __('Proficiency') }}:</strong> <span id="modalSkillPercentage"></span>%</p>
                    </div>
                    <div class="col-md-6">
                        <div class="radial-progress" id="modalRadialProgress"></div>
                    </div>
                </div>
                <hr>
                <p><strong>{{ __('Description') }}:</strong></p>
                <p id="modalSkillDescription"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
