@extends('admin.layouts.app')

@section('title', __('Edit Certificate'))
@section('header', __('Edit Certificate'))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.certificates.index') }}">{{ __('Certificates') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Edit Certificate') }}</li>
    </ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Edit Certificate Details') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_en">{{ __('Name (English)') }}</label>
                                    <input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" value="{{ old('name_en', $certificate->name_en) }}" required>
                                    @error('name_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_ar">{{ __('Name (Arabic)') }}</label>
                                    <input type="text" name="name_ar" id="name_ar" class="form-control @error('name_ar') is-invalid @enderror" value="{{ old('name_ar', $certificate->name_ar) }}" required>
                                    @error('name_ar')
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
                                    <label for="issuer_en">{{ __('Issuer (English)') }}</label>
                                    <input type="text" name="issuer_en" id="issuer_en" class="form-control @error('issuer_en') is-invalid @enderror" value="{{ old('issuer_en', $certificate->issuer_en) }}" required>
                                    @error('issuer_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="issuer_ar">{{ __('Issuer (Arabic)') }}</label>
                                    <input type="text" name="issuer_ar" id="issuer_ar" class="form-control @error('issuer_ar') is-invalid @enderror" value="{{ old('issuer_ar', $certificate->issuer_ar) }}" required>
                                    @error('issuer_ar')
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
                                    <label for="date">{{ __('Date') }}</label>
                                    <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('birth_date',  $certificate->birth_date ? \Carbon\Carbon::parse($certificate->birth_date)->format('Y-m-d') : '') }}" required>
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">{{ __('Image') }}</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror">
                                        <label class="custom-file-label" for="image">{{ __('Choose file') }}</label>
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if($certificate->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/'.$certificate->image) }}" alt="Current Image" width="100" class="img-thumbnail">
                                            <small class="text-muted">{{ __('Current Image') }}</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Show the file name when a file is selected
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("image").files[0]?.name || "{{ __('Choose file') }}";
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endpush