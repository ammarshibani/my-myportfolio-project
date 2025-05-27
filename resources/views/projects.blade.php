@extends('layouts.app')

@section('title', __('My Projects'))

@section('content')
<section class="projects-section py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold">{{ __('My Projects') }}</h1>
                <p class="lead">{{ __('Explore my portfolio of completed works') }}</p>
            </div>
        </div>

        <!-- Projects Filter -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="projects-filter text-center">
                    <button class="btn btn-outline-primary filter-btn active" data-filter="all">{{ __('All') }}</button>
                    @foreach($categories as $category)
                        <button class="btn btn-outline-primary filter-btn" data-filter="{{ Str::slug($category) }}">{{ $category }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="row projects-grid g-4">
            @foreach($projects as $project)
                <div class="col-md-6 col-lg-4 project-item" data-category="{{ Str::slug($project->category) }}">
                    <div class="card project-card h-100">
                        <div class="project-image-container">
                            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="{{ $project->title_en }}">
                            <div class="project-overlay">
                                <div class="project-links">
                                    @if($project->link)
                                        <a href="{{ $project->link }}" class="btn btn-primary btn-sm" target="_blank">
                                            <i class="fas fa-external-link-alt"></i> {{ __('View Live') }}
                                        </a>
                                    @endif
                                    <button class="btn btn-light btn-sm project-details-btn" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#projectModal"
                                            data-title="{{ $project->title_en }}"
                                            data-category="{{ $project->category }}"
                                            data-date="{{ $project->date->format('F Y') }}"
                                            data-technologies="{{ $project->technologies }}"
                                            data-description="{{ $project->description_en }}"
                                            data-image="{{ asset('storage/' . $project->image) }}">
                                        <i class="fas fa-info-circle"></i> {{ __('Details') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="h5 card-title">{{ $project->title_en }}</h3>
                            <div class="project-meta d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">{{ $project->category }}</span>
                                <small class="text-muted">{{ $project->date->format('M Y') }}</small>
                            </div>
                            <p class="card-text mt-2">{{ Str::limit($project->description_en, 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="technologies">
                                    @foreach(explode(',', $project->technologies) as $tech)
                                        <span class="badge bg-secondary me-1">{{ trim($tech) }}</span>
                                    @endforeach
                                </div>
                                <button class="btn btn-sm btn-outline-primary toggle-favorite" data-project-id="{{ $project->id }}">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Projects Timeline -->
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center mb-4">{{ __('Projects Timeline') }}</h2>
                <div class="timeline-container">
                    <div class="timeline" id="projectsTimeline"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Project Details Modal -->
<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="projectModalLabel">{{ __('Project Details') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="" id="modalProjectImage" class="img-fluid rounded mb-3" alt="Project Image">
                    </div>
                    <div class="col-md-6">
                        <h3 id="modalProjectTitle" class="h4"></h3>
                        <div class="project-meta mb-3">
                            <span class="badge bg-primary" id="modalProjectCategory"></span>
                            <span class="text-muted ms-2" id="modalProjectDate"></span>
                        </div>
                        <p><strong>{{ __('Technologies') }}:</strong> <span id="modalProjectTechnologies"></span></p>
                        <hr>
                        <p id="modalProjectDescription"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id="modalProjectLink" class="btn btn-primary" target="_blank">
                    <i class="fas fa-external-link-alt"></i> {{ __('View Project') }}
                </a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.7.0/dist/vanilla-tilt.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush