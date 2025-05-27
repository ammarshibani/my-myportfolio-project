@extends('layouts.app')

@section('title', __('Contact Me'))

@section('content')
<section class="contact-section py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold">{{ __('Contact Me') }}</h1>
                <p class="lead">{{ __('Get in touch for collaborations or inquiries') }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Contact Info -->
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="contact-info-card card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="h4 mb-4">{{ __('Contact Information') }}</h2>
                        
                        <div class="contact-method mb-4">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h3 class="h5">{{ __('Email') }}</h3>
                                <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                            </div>
                        </div>
                        
                        <div class="contact-method mb-4">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h3 class="h5">{{ __('Phone') }}</h3>
                                <a href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a>
                            </div>
                        </div>
                        
                        <div class="contact-method mb-4">
                            <div class="contact-icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="contact-details">
                                <h3 class="h5">{{ __('WhatsApp') }}</h3>
                                <a href="https://wa.me/{{ $profile->whatsapp }}">{{ $profile->whatsapp }}</a>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h3 class="h5">{{ __('Address') }}</h3>
                                <p>{{ $profile->address_en }}</p>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <h3 class="h5 mb-3">{{ __('Social Media') }}</h3>
                        <div class="social-links d-flex gap-3">
                            <a href="#" class="social-link" target="_blank">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-link" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="social-link" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-link" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="contact-form-card card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="h4 mb-4">{{ __('Send Me a Message') }}</h2>
                        
                        <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">{{ __('Your Name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                    <div class="invalid-feedback" id="nameError"></div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">{{ __('Your Email') }}</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <div class="invalid-feedback" id="emailError"></div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">{{ __('Subject') }}</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                                <div class="invalid-feedback" id="subjectError"></div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">{{ __('Your Message') }}</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                <div class="invalid-feedback" id="messageError"></div>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                    <span class="spinner-border spinner-border-sm d-none" id="spinner" role="status" aria-hidden="true"></span>
                                    {{ __('Send Message') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="success-icon mb-4">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3 class="h4 mb-3">{{ __('Message Sent Successfully!') }}</h3>
                <p class="mb-4">{{ __('Thank you for contacting me. I will get back to you as soon as possible.') }}</p>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection