@extends('admin.layouts.app')

@section('title', __('Skill Details'))
@section('header', __('Skill Details'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.skills.index') }}">{{ __('Skills') }}</a></li>
    <li class="breadcrumb-item active">{{ $skill->name_en }}</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Skill Information') }}</h3>
        <div class="card-tools">
            <a href="{{ route('admin.skills.edit', $skill->id) }}" 
               class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i> {{ __('Edit') }}
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4>{{ __('English Details') }}</h4>
                <dl class="row">
                    <dt class="col-sm-4">{{ __('Name') }}:</dt>
                    <dd class="col-sm-8">{{ $skill->name_en }}</dd>
                </dl>
            </div>
            <div class="col-md-6">
                <h4>{{ __('Arabic Details') }}</h4>
                <dl class="row">
                    <dt class="col-sm-4">{{ __('Name') }}:</dt>
                    <dd class="col-sm-8">{{ $skill->name_ar }}</dd>
                </dl>
            </div>
            <div class="col-md-12">
                <hr>
                <dl class="row">
                    <dt class="col-sm-2">{{ __('Percentage') }}:</dt>
                    <dd class="col-sm-10">
                        <div class="progress">
                            <div class="progress-bar bg-primary" 
                                 style="width: {{ $skill->percentage }}%">
                                {{ $skill->percentage }}%
                            </div>
                        </div>
                    </dd>
                    
                    <dt class="col-sm-2">{{ __('Category') }}:</dt>
                    <dd class="col-sm-10">{{ $skill->category }}</dd>
                    
                    <dt class="col-sm-2">{{ __('Created At') }}:</dt>
                    <dd class="col-sm-10">{{ $skill->created_at->format('Y-m-d H:i') }}</dd>
                    
                    <dt class="col-sm-2">{{ __('Updated At') }}:</dt>
                    <dd class="col-sm-10">{{ $skill->updated_at->format('Y-m-d H:i') }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsectionv