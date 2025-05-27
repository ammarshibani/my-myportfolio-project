@extends('admin.layouts.app')

@section('title', __('Dashboard'))
@section('header', __('Dashboard Overview'))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">{{ __('Dashboard') }}</li>
    </ol>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-code"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Skills') }}</span>
                    <span class="info-box-number">{{ $stats['skills'] }}</span>
                </div>
                <a href="{{ route('admin.skills.index') }}" class="info-box-footer-link"></a>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-project-diagram"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Projects') }}</span>
                    <span class="info-box-number">{{ $stats['projects'] }}</span>
                </div>
                <a href="{{ route('admin.projects.index') }}" class="info-box-footer-link"></a>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-certificate"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Certificates') }}</span>
                    <span class="info-box-number">{{ $stats['certificates'] }}</span>
                </div>
                <a href="{{ route('admin.certificates.index') }}" class="info-box-footer-link"></a>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-graduation-cap"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Education') }}</span>
                    <span class="info-box-number">{{ $stats['educations'] }}</span>
                </div>
                <a href="{{ route('admin.educations.index') }}" class="info-box-footer-link"></a>
            </div>
        </div>
    </div>

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
            <!-- Recent Projects -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Recent Projects') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-tool">{{ __('View All') }}</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Technologies') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentProjects as $project)
                                <tr>
                                    <td>{{ $project->title_en }}</td>
                                    <td>{{ $project->technologies }}</td>
                                    <td>{{ \Carbon\Carbon::parse($project->date)->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-sm btn-primary">{{ __('View') }}</a>
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">{{ __('Edit') }}</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">{{ __('No projects found') }}</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->

        <!-- Right col -->
        <div class="col-md-4">
            <!-- Profile Summary -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Profile Summary') }}</h3>
                </div>
                <div class="card-body text-center">
                    @if($profile->photo)
                        <img src="{{ asset('storage/'.$profile->photo) }}" alt="Profile Photo" class="img-circle img-fluid" width="150">
                    @else
                        <div class="img-circle img-fluid bg-secondary d-flex align-items-center justify-content-center" 
                             style="width:150px; height:150px; margin:0 auto;">
                            <i class="fas fa-user fa-3x text-white"></i>
                        </div>
                    @endif
                    <h4 class="mt-3">{{ $profile->full_name_en }}</h4>
                    <p class="text-muted">{{ $profile->email }}</p>
                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary btn-sm">
                        {{ __('Edit Profile') }}
                    </a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Quick Actions') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-app bg-success">
                                <i class="fas fa-plus"></i> {{ __('Add Project') }}
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('admin.skills.create') }}" class="btn btn-app bg-info">
                                <i class="fas fa-plus"></i> {{ __('Add Skill') }}
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('admin.certificates.create') }}" class="btn btn-app bg-warning">
                                <i class="fas fa-plus"></i> {{ __('Add Certificate') }}
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('admin.educations.create') }}" class="btn btn-app bg-danger">
                                <i class="fas fa-plus"></i> {{ __('Add Education') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@endsection