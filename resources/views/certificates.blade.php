@extends('layouts.app')

@section('title', __('My Certificates'))

@section('content')
<section class="certificates-section py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold">{{ __('My Certificates') }}</h1>
                <p class="lead">{{ __('Professional certifications and achievements') }}</p>
            </div>
        </div>

        <!-- Certificates Filter -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="certificates-filter text-center">
                    <button class="btn btn-outline-primary filter-btn active" data-filter="all">{{ __('All') }}</button>
                    @foreach($issuers as $issuer)
                        <button class="btn btn-outline-primary filter-btn" data-filter="{{ Str::slug($issuer) }}">{{ $issuer }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Certificates Grid -->
<!-- Certificates Grid -->
<div class="row certificates-grid">
    @foreach($certificates as $certificate)
        @php
            $certificateDate = \Carbon\Carbon::parse($certificate->date);
        @endphp
        <div class="col-md-6 col-lg-4 mb-4 certificate-item" 
             data-issuer="{{ Str::slug($certificate->issuer_en) }}" 
             data-date="{{ $certificateDate->format('Y-m-d') }}">
            <div class="card certificate-card h-100">
                <div class="certificate-image-container">
                    <img src="{{ asset('storage/' . $certificate->image) }}" class="card-img-top" alt="{{ $certificate->name_en }}">
                    <div class="certificate-overlay">
                        <button class="btn btn-light certificate-view-btn" 
                                data-bs-toggle="modal" 
                                data-bs-target="#certificateModal"
                                data-name="{{ $certificate->name_en }}"
                                data-issuer="{{ $certificate->issuer_en }}"
                                data-date="{{ $certificateDate->format('F Y') }}"
                                data-description="{{ $certificate->description_en }}"
                                data-image="{{ asset('storage/' . $certificate->image) }}">
                            <i class="fas fa-expand"></i> {{ __('View') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="h5 card-title">{{ $certificate->name_en }}</h3>
                    <div class="certificate-meta d-flex justify-content-between">
                        <span class="text-primary">{{ $certificate->issuer_en }}</span>
                        <small class="text-muted">{{ $certificateDate->format('M Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
        <!-- Certificates Timeline -->
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center mb-4">{{ __('Certificates Timeline') }}</h2>
                <div class="timeline-container">
                    <div class="timeline" id="certificatesTimeline"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certificate Modal -->
<div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="certificateModalLabel">{{ __('Certificate Details') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h3 id="modalCertificateName" class="h4 mb-3"></h3>
                <div class="certificate-meta mb-4">
                    <span class="text-primary" id="modalCertificateIssuer"></span>
                    <span class="text-muted ms-3" id="modalCertificateDate"></span>
                </div>
                <img src="" id="modalCertificateImage" class="img-fluid rounded shadow" alt="Certificate" style="max-height: 70vh;">
                <p class="mt-4" id="modalCertificateDescription"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <a href="#" id="modalCertificateDownload" class="btn btn-primary" download>
                    <i class="fas fa-download"></i> {{ __('Download') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
