@extends('admin.layouts.app')

@section('title', __('Skills Management'))
@section('header', __('All Skills'))

@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('Skills') }}</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Skills List') }}</h3>
        <div class="card-tools">
            <a href="{{ route('admin.skills.create') }}" class="btn btn-sm btn-success">
                <i class="fas fa-plus"></i> {{ __('Add New') }}
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>{{ __('Name (English)') }}</th>
                        <th>{{ __('Name (Arabic)') }}</th>
                        <th>{{ __('Percentage') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skills as $skill)
                    <tr>
                        <td>{{ $skill->id }}</td>
                        <td>{{ $skill->name_en }}</td>
                        <td>{{ $skill->name_ar }}</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-primary" 
                                     style="width: {{ $skill->percentage }}%"></div>
                            </div>
                            <span class="badge bg-primary">{{ $skill->percentage }}%</span>
                        </td>
                        <td>{{ $skill->category }}</td>
                        <td>
                            <a href="{{ route('admin.skills.edit', $skill->id) }}" 
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.skills.destroy', $skill->id) }}" 
                                  method="POST" 
                                  style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger confirm-before-delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">{{ __('No skills found') }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($skills->hasPages())
    <div class="card-footer clearfix">
        {{ $skills->links() }}
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.confirm-before-delete').on('click', function(e) {
            e.preventDefault();
            if (confirm('{{ __("Are you sure you want to delete this item?") }}')) {
                $(this).closest('form').submit();
            }
        });
    });
</script>
@endsection