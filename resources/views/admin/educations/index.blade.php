@extends('admin.layouts.app')

@section('title', __('Educations Management'))
@section('header', __('Educations'))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Educations') }}</li>
    </ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('All Educations') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.educations.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> {{ __('Add New') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Degree') }}</th>
                                    <th>{{ __('University') }}</th>
                                    <th>{{ __('Start Date') }}</th>
                                    <th>{{ __('End Date') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($educations as $education)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $education->degree_en }}</td>
                                    <td>{{ $education->university_en }}</td>
                                    <td>{{ \Carbon\Carbon::parse($education->start_date)->format('Y-m-d') }}</td>
                                    <td>{{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('Y-m-d') : __('Present') }}</td>
                                    <td>{{ Str::limit($education->description_en, 50) }}</td>
                                    <td>
                                        <a href="{{ route('admin.educations.show', $education->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.educations.edit', $education->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.educations.destroy', $education->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger confirm-before-delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $educations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection