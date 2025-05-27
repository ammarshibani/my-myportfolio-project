@extends('admin.layouts.app')

@section('title', __('Add New Education'))
@section('header', __('Add New Education'))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.educations.index') }}">{{ __('Educations') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Add New') }}</li>
    </ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Education Details') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.educations.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="degree_en">{{ __('Degree (English)') }}</label>
                                    <input type="text" name="degree_en" id="degree_en" class="form-control @error('degree_en') is-invalid @enderror" value="{{ old('degree_en') }}" required>
                                    @error('degree_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="degree_ar">{{ __('Degree (Arabic)') }}</label>
                                    <input type="text" name="degree_ar" id="degree_ar" class="form-control @error('degree_ar') is-invalid @enderror" value="{{ old('degree_ar') }}" required>
                                    @error('degree_ar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="university_en">{{ __('University (English)') }}</label>
                                    <input type="text" name="university_en" id="university_en" class="form-control @error('university_en') is-invalid @enderror" value="{{ old('university_en') }}" required>
                                    @error('university_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="university_ar">{{ __('University (Arabic)') }}</label>
                                    <input type="text" name="university_ar" id="university_ar" class="form-control @error('university_ar') is-invalid @enderror" value="{{ old('university_ar') }}" required>
                                    @error('university_ar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date">{{ __('Start Date') }}</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date">{{ __('End Date') }}</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
                                    <small class="text-muted">{{ __('Leave empty if still studying') }}</small>
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_en">{{ __('Description (English)') }}</label>
                                    <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" rows="3">{{ old('description_en') }}</textarea>
                                    @error('description_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_ar">{{ __('Description (Arabic)') }}</label>
                                    <textarea name="description_ar" id="description_ar" class="form-control @error('description_ar') is-invalid @enderror" rows="3">{{ old('description_ar') }}</textarea>
                                    @error('description_ar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            <a href="{{ route('admin.educations.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection