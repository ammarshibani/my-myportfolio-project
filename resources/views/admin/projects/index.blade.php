@extends('admin.layouts.app')

@section('title', __('Projects Management'))
@section('header', __('Projects'))

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Projects') }}</li>
    </ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('All Projects') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> {{ __('Add New') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped data-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Technologies') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title_en }}" width="80">
                                    </td>
                                    <td>{{ $project->title_en }}</td>
                                    <td>{{ $project->technologies }}</td>
                                    <td>{{ \Carbon\Carbon::parse($project->date)->format('Y-m-d') }}</td>
                                    {{-- <td>{{ $project->date->format('Y-m-d') }}</td> --}}
                                    <td>
                                        <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-sm btn-info" title="{{ __('View') }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning" title="{{ __('Edit') }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger confirm-before-delete" title="{{ __('Delete') }}">
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
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
        $('.data-table').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });

        $('.confirm-before-delete').on('click', function(e) {
            e.preventDefault();
            if (confirm('{{ __("Are you sure you want to delete this project?") }}')) {
                $(this).closest('form').submit();
            }
        });
    });
</script>
@endsection