@extends('layouts.dashboard')

@section('title', 'Categories')
@section('section-title', 'Categories')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Categories Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Parent</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
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
                                            <td>{{ $category->parent_id }}</td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>{{ $category->updated_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                                                        class="btn btn-info">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="POST"
                                                        action="{{ route('dashboard.categories.destroy', $category->id) }}">
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
                                            <td colspan="7" class="text-center">
                                                <div class="p-4">
                                                    <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                                                    <h5 class="text-muted">No categories found!</h5>
                                                    <p class="text-secondary small">Try adding some categories to see them
                                                        here.</p>
                                                    <a href="{{ route('dashboard.categories.create') }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-plus"></i> Add New Category
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
