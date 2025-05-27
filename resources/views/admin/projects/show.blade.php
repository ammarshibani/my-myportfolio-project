@extends('admin.layouts.app')

@section('title', __('View Project'))
@section('header', __('View Project'))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">{{ __('Projects') }}</a></li>
        <li class="breadcrumb-item active">{{ __('View') }}</li>
    </ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Project Details') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title_en }}" class="img-fluid rounded" style="max-height: 300px;">
                            </div>
                            <h4>{{ __('English Information') }}</h4>
                            <hr>
                            <dl class="row">
                                <dt class="col-sm-4">{{ __('Title') }}:</dt>
                                <dd class="col-sm-8">{{ $project->title_en }}</dd>
                                
                                <dt class="col-sm-4">{{ __('Description') }}:</dt>
                                <dd class="col-sm-8">{!! $project->description_en !!}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h4>{{ __('Project Meta') }}</h4>
                                <hr>
                                <dl class="row">
                                    <dt class="col-sm-4">{{ __('Date') }}:</dt>
                                    <dd class="col-sm-8">{ \Carbon\Carbon::parse($project->date)->format('Y-m-d') }}</dd>
                                    
                                    <dt class="col-sm-4">{{ __('Technologies') }}:</dt>
                                    <dd class="col-sm-8">{{ $project->technologies }}</dd>
                                    
                                    @if($project->link)
                                    <dt class="col-sm-4">{{ __('Project Link') }}:</dt>
                                    <dd class="col-sm-8">
                                        <a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a>
                                    </dd>
                                    @endif
                                </dl>
                            </div>
                            <h4>{{ __('Arabic Information') }}</h4>
                            <hr>
                            <dl class="row">
                                <dt class="col-sm-4">{{ __('Title') }}:</dt>
                                <dd class="col-sm-8">{{ $project->title_ar }}</dd>
                                
                                <dt class="col-sm-4">{{ __('Description') }}:</dt>
                                <dd class="col-sm-8">{!! $project->description_ar !!}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> {{ __('Edit') }}
                    </a>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary float-right">
                        <i class="fas fa-arrow-left"></i> {{ __('Back to List') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection