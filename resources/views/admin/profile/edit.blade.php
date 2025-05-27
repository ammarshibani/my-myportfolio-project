@extends('admin.layouts.app')

@section('title', __('Profile Management'))
@section('header', __('Edit Profile'))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Profile') }}</li>
    </ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Profile Information') }}</h3>
                </div>

                <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>{{ __('English Information') }}</h4>
                                <hr>

                                <div class="form-group">
                                    <label for="full_name_en">{{ __('Full Name') }} (EN)</label>
                                    <input type="text" class="form-control" id="full_name_en" name="full_name_en" 
                                           value="{{ old('full_name_en', $profile->full_name_en) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="short_name_en">{{ __('Short Name') }} (EN)</label>
                                    <input type="text" class="form-control" id="short_name_en" name="short_name_en" 
                                           value="{{ old('short_name_en', $profile->short_name_en) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="about_en">{{ __('About') }} (EN)</label>
                                    <textarea class="form-control summernote" id="about_en" name="about_en" rows="5"
                                              required>{{ old('about_en', $profile->about_en) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="address_en">{{ __('Address') }} (EN)</label>
                                    <textarea class="form-control" id="address_en" name="address_en" rows="2"
                                              required>{{ old('address_en', $profile->address_en) }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h4>{{ __('Arabic Information') }}</h4>
                                <hr>

                                <div class="form-group">
                                    <label for="full_name_ar">{{ __('Full Name') }} (AR)</label>
                                    <input type="text" class="form-control" id="full_name_ar" name="full_name_ar" 
                                           value="{{ old('full_name_ar', $profile->full_name_ar) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="short_name_ar">{{ __('Short Name') }} (AR)</label>
                                    <input type="text" class="form-control" id="short_name_ar" name="short_name_ar" 
                                           value="{{ old('short_name_ar', $profile->short_name_ar) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="about_ar">{{ __('About') }} (AR)</label>
                                    <textarea class="form-control summernote" id="about_ar" name="about_ar" rows="5"
                                              required>{{ old('about_ar', $profile->about_ar) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="address_ar">{{ __('Address') }} (AR)</label>
                                    <textarea class="form-control" id="address_ar" name="address_ar" rows="2"
                                              required>{{ old('address_ar', $profile->address_ar) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h4>{{ __('Contact Information') }}</h4>
                                <hr>

                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="{{ old('email', $profile->email) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">{{ __('Phone') }}</label>
                                    <input type="text" class="form-control" id="phone" name="phone" 
                                           value="{{ old('phone', $profile->phone) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="whatsapp">{{ __('WhatsApp') }}</label>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" 
                                           value="{{ old('whatsapp', $profile->whatsapp) }}" required>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="birth_date">{{ __('Birth Date') }}</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" 
                                           value="{{ old('birth_date', $profile->birth_date ? $profile->birth_date->format('Y-m-d') : '') }}" required>
                                           <input type="date" class="form-control" id="birth_date" name="birth_date" 
                                            value="{{ old('birth_date', $profile->birth_date ? \Carbon\Carbon::parse($profile->birth_date)->format('Y-m-d') : '') }}" required>
                                </div> --}}
                                <div class="form-group">
    <label for="birth_date">{{ __('Birth Date') }}</label>
    <input type="date" class="form-control" id="birth_date" name="birth_date"
           value="{{ old('birth_date', $profile->birth_date ? \Carbon\Carbon::parse($profile->birth_date)->format('Y-m-d') : '') }}" required>
</div>

                            </div>

                            <div class="col-md-6">
                                <h4>{{ __('Media') }}</h4>
                                <hr>

                                <div class="form-group">
                                    <label for="photo">{{ __('Profile Photo') }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photo" name="photo">
                                        <label class="custom-file-label" for="photo">{{ __('Choose file') }}</label>
                                    </div>
                                    @if($profile->photo)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/'.$profile->photo) }}" alt="Profile Photo" class="img-thumbnail" width="150">
                                            <a href="#" class="btn btn-sm btn-danger ml-2 confirm-before-delete"
                                               data-confirm="{{ __('Are you sure you want to delete this photo?') }}"
                                               data-form-id="delete-photo-form">{{ __('Delete') }}</a>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="logo">{{ __('Logo') }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo">
                                        <label class="custom-file-label" for="logo">{{ __('Choose file') }}</label>
                                    </div>
                                    @if($profile->logo)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/'.$profile->logo) }}" alt="Logo" class="img-thumbnail" width="150">
                                            <a href="#" class="btn btn-sm btn-danger ml-2 confirm-before-delete"
                                               data-confirm="{{ __('Are you sure you want to delete this logo?') }}"
                                               data-form-id="delete-logo-form">{{ __('Delete') }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary float-right">{{ __('Cancel') }}</a>
                    </div>
                </form>

                <!-- Forms for deleting photos (hidden) -->
                @if($profile->photo)
                    <form id="delete-photo-form" action="{{ route('admin.profile.delete.photo') }}" method="POST" style="display: none;">
                        @csrf @method('DELETE')
                    </form>
                @endif

                @if($profile->logo)
                    <form id="delete-logo-form" action="{{ route('admin.profile.delete.logo') }}" method="POST" style="display: none;">
                        @csrf @method('DELETE')
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
        // Initialize summernote
        $('.summernote').summernote({
            height: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });

        // Handle file input labels
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        // Confirm before delete actions
        $('.confirm-before-delete').on('click', function(e) {
            e.preventDefault();
            if (confirm($(this).data('confirm'))) {
                $('#' + $(this).data('form-id')).submit();
            }
        });
    });
</script>
@endsection