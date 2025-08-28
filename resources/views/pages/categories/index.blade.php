@extends('layouts.main')

@section('header')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0">Categories</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Category Thumbnail</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Is Deleted</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <img src="{{ asset('uploads/' . $category->image) }}" alt="{{ $category->name }}" class="img-thumbnail" style="max-width: 100px;">
                                        </div>
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td class="text-center align-middle">
                                        @if (!$category->deleted_at)
                                            <i class="bi bi-x-circle-fill text-success" title="Deleted"></i>
                                        @else
                                            <i class="bi bi-check-circle-fill text-danger" title="Active"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!$category->deleted_at)
                                            <button type="button" class="btn btn-sm btn-warning me-1 edit-category-btn"
                                                data-id="{{ $category->id }}"
                                                data-name="{{ $category->name }}"
                                                data-description="{{ $category->description }}"
                                                data-image="{{ asset('uploads/' . $category->image) }}"
                                                title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <form action="{{ route('categories.softDelete', $category->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('categories.restore', $category->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success me-1" title="Restore" onclick="return confirm('Are you sure?')">
                                                    <i class="bi bi-arrow-clockwise"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-dark" title="Force Delete" onclick="return confirm('This will permanently delete the category. Continue?')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Add New Category</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Category Image</label>
                    <div class="d-flex justify-content-center mb-2">
                        <img src="" alt="Category Image Preview" id="image-preview" class="img-fluid" style="display: none; height: 120px; object-fit: cover;">
                    </div>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="edit-category-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit-name" class="form-label">Category Name</label>
                            <input type="text" name="name" id="edit-name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-image" class="form-label">Category Image</label>
                            <div class="d-flex justify-content-center mb-2">
                                <img src="" alt="Category Image Preview" id="edit-image-preview" class="img-fluid" style="display: none; height: 120px; object-fit: cover;">
                            </div>
                            <input type="file" name="image" id="edit-image" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="edit-description" class="form-label">Description</label>
                            <textarea name="description" id="edit-description" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Image preview for add
        document.getElementById('image').addEventListener('change', function(event) {
            const [file] = event.target.files;
            const preview = document.getElementById('image-preview');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        });

        // Image preview for edit
        document.getElementById('edit-image').addEventListener('change', function(event) {
            const [file] = event.target.files;
            const preview = document.getElementById('edit-image-preview');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });

        // Handle edit button click
        document.querySelectorAll('.edit-category-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const description = this.getAttribute('data-description');
                const image = this.getAttribute('data-image');

                document.getElementById('edit-name').value = name;
                document.getElementById('edit-description').value = description;
                const preview = document.getElementById('edit-image-preview');
                if (image) {
                    preview.src = image;
                    preview.style.display = 'block';
                } else {
                    preview.src = '';
                    preview.style.display = 'none';
                }

                // Set form action
                document.getElementById('edit-category-form').action = '/categories/' + id;

                // Show modal
                var editModal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
                editModal.show();
            });
        });
    </script>
@endsection
