@extends('admin.layouts.app')

@section('title', __('Certificates Management'))
@section('header', __('Certificates'))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Certificates') }}</li>
    </ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('All Certificates') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary btn-sm">
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
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Issuer') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($certificates as $certificate)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $certificate->name_en }}</td>
                                    <td>{{ $certificate->issuer_en }}</td>
                                    <td>{{ \Carbon\Carbon::parse($certificate->date)->format('Y-m-d') }}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$certificate->image) }}" width="80" alt="Certificate">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.certificates.edit', $certificate->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST" style="display: inline-block;">
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
                        {{ $certificates->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection