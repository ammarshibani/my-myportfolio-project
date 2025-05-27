@extends('admin.layouts.app')

@section('title', __('Education Details'))
@section('header', __('Education Details'))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.educations.index') }}">{{ __('Educations') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Education Details') }}</li>
    </ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Education Information') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.educations.edit', $education->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> {{ __('Edit') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Degree (English)') }}</label>
                                <p class="form-control-static">{{ $education->degree_en }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Degree (Arabic)') }}</label>
                                <p class="form-control-static">{{ $education->degree_ar }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('University (English)') }}</label>
                                <p class="form-control-static">{{ $education->university_en }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('University (Arabic)') }}</label>
                                <p class="form-control-static">{{ $education->university_ar }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Start Date') }}</label>
                                <p class="form-control-static">{{ \Carbon\Carbon::parse($education->start_date)->format('Y-m-d') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('End Date') }}</label>
                                <p class="form-control-static">{{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('Y-m-d') : __('Present') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Description (English)') }}</label>
                                <p class="form-control-static">{!! nl2br(e($education->description_en)) !!}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Description (Arabic)') }}</label>
                                <p class="form-control-static">{!! nl2br(e($education->description_ar)) !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('admin.educations.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection