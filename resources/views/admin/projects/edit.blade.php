@extends('admin.layouts.app')

@section('title', __('Edit Project'))
@section('header', __('Edit Project'))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">{{ __('Projects') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Edit') }}</li>
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
                <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>{{ __('English Information') }}</h4>
                                <hr>
                                <div class="form-group">
                                    <label for="title_en">{{ __('Title') }} (EN)</label>
                                    <input type="text" class="form-control" id="title_en" name="title_en" 
                                           value="{{ old('title_en', $project->title_en) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description_en">{{ __('Description') }} (EN)</label>
                                    <textarea class="form-control summernote" id="description_en" name="description_en" 
                                              rows="5" required>{{ old('description_en', $project->description_en) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>{{ __('Arabic Information') }}</h4>
                                <hr>
                                <div class="form-group">
                                    <label for="title_ar">{{ __('Title') }} (AR)</label>
                                    <input type="text" class="form-control" id="title_ar" name="title_ar" 
                                           value="{{ old('title_ar', $project->title_ar) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description_ar">{{ __('Description') }} (AR)</label>
                                    <textarea class="form-control summernote" id="description_ar" name="description_ar" 
                                              rows="5" required>{{ old('description_ar', $project->description_ar) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">{{ __('Project Image') }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">{{ __('Choose new image (optional)') }}</label>
                                    </div>
                                    <small class="form-text text-muted">{{ __('Leave empty to keep current image') }}</small>
                                    @if($project->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/'.$project->image) }}" alt="Current Image" width="150" class="img-thumbnail">
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="date">{{ __('Project Date') }}</label>
                                    <input type="date" class="form-control" id="date" name="date" 
                                          value="{{ old('birth_date',  $project->birth_date ? \Carbon\Carbon::parse($project->birth_date)->format('Y-m-d') : '') }}" required>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="technologies">{{ __('Technologies Used') }}</label>
                                    <input type="text" class="form-control" id="technologies" name="technologies" 
                                           value="{{ old('technologies', $project->technologies) }}" required>
                                    <small class="form-text text-muted">{{ __('Separate technologies with commas') }}</small>
                                </div>
                                <div class="form-group">
                                    <label for="link">{{ __('Project Link') }}</label>
                                    <input type="url" class="form-control" id="link" name="link" 
                                           value="{{ old('link', $project->link) }}" placeholder="https://example.com">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Update Project') }}</button>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary float-right">{{ __('Cancel') }}</a>
                    </div>
                </form>
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
    });
</script>
@endsection