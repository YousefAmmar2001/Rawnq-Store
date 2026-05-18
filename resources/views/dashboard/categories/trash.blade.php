@extends('layouts.dashboard')

@section('title', 'Trashed Categories')
@section('section-title', 'Trashed Categories')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">Trash</li>
@endsection

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <x-alert type="success" />
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Categories Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ URL::current() }}" method="get" class="mb-4">
                                <div class="d-flex align-items-center" style="gap: 10px;">
                                    <div style="flex: 2;">
                                        <input type="text" name="name" value="{{ request('name') }}"
                                            placeholder="Search by name..." class="form-control">
                                    </div>
                                    <div style="flex: 1; min-width: 150px;">
                                        <select name="status" class="form-control statuses">
                                            <option value="">
                                                All Status
                                            </option>
                                            <option value="active" @selected(request('status') == 'active')>
                                                Active
                                            </option>
                                            <option value="archived" @selected(request('status') == 'archived')>
                                                Archived
                                            </option>
                                        </select>
                                    </div>
                                    <div class="d-flex" style="gap: 5px;">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i> Filter
                                        </button>
                                        <a href="{{ URL::current() }}" class="btn btn-outline-secondary">
                                            <i class="fas fa-sync"></i> Reset
                                        </a>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Deleted At</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>
                                                @if ($category->image)
                                                    <img src="{{ Storage::url($category->image) }}"
                                                        alt="{{ $category->name }}" height="80">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->status }}</td>
                                            <td>{{ $category->deleted_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form method="POST"
                                                        action="{{ route('dashboard.categories.restore', $category->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-warning">
                                                            <i class="fas fa-trash-restore"></i>
                                                        </button>
                                                    </form>
                                                    <form method="POST"
                                                        action="{{ route('dashboard.categories.force-delete', $category->id) }}"
                                                        onsubmit="return confirm('Are you sure you want to delete this category forever?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <div class="p-4">
                                                    <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                                                    <h5 class="text-muted">No categories found!</h5>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $categories->withQueryString()->links() }}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.statuses').select2({
            theme: 'bootstrap4',
        })
    </script>
@endpush
