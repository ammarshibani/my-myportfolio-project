@extends('admin.layouts.app')

@section('title', __('Edit Skill'))
@section('header', __('Edit Skill'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.skills.index') }}">{{ __('Skills') }}</a></li>
    <li class="breadcrumb-item active">{{ $skill->name_en }}</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Edit Skill Details') }}</h3>
    </div>
    <form method="POST" action="{{ route('admin.skills.update', $skill->id) }}">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ __('Name (English)') }} <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name_en" 
                               class="form-control @error('name_en') is-invalid @enderror" 
                               value="{{ old('name_en', $skill->name_en) }}"
                               required>
                        @error('name_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ __('Name (Arabic)') }} <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name_ar" 
                               class="form-control @error('name_ar') is-invalid @enderror" 
                               value="{{ old('name_ar', $skill->name_ar) }}"
                               required>
                        @error('name_ar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ __('Percentage') }} <span class="text-danger">*</span></label>
                        <input type="number" 
                               name="percentage" 
                               min="1" 
                               max="100" 
                               class="form-control @error('percentage') is-invalid @enderror" 
                               value="{{ old('percentage', $skill->percentage) }}"
                               required>
                        @error('percentage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ __('Category') }} <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="category" 
                               class="form-control @error('category') is-invalid @enderror" 
                               value="{{ old('category', $skill->category) }}"
                               required>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ __('Update Skill') }}</button>
            <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary float-right">
                {{ __('Cancel') }}
            </a>
        </div>
    </form>
</div>
@endsection