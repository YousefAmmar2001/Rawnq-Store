<div class="card-body">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $category->name) }}"
            placeholder="Enter Name">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label>Parent</label>
        <select class="form-control select2 categories" name="parent_id" style="width: 100%;">
            <option value="">Primary Category</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}" @selected(old('parent_id', $category->parent_id) == $parent->id)>
                    {{ $parent->name }}</option>
            @endforeach
        </select>
        @error('parent_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Description">{{ old('description', $category->description) }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image">
                <label class="custom-file-label" for="image">Choose image</label>
            </div>
        </div>
        @error('image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div id="image-preview" class="mt-2"
        style="{{ $category->image ? 'display:inline-block;' : 'display:none;' }} position: relative;">
        <img id="preview-img" src="{{ $category->image ? Storage::url($category->image) : '' }}" alt="Preview"
            style="max-height: 150px; border-radius: 8px; border: 1px solid #ddd; display: block;">
        <button type="button" id="remove-image"
            style="position: absolute; top: -8px; right: -8px;
                                               background: red; color: white; border: none;
                                               border-radius: 50%; width: 22px; height: 22px;
                                               font-size: 14px; line-height: 1; cursor: pointer;">
            &times;
        </button>
    </div>
    <div class="form-group">
        <label>Status</label>
        <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="active" name="status" value="active"
                @checked(old('status', $category->status) == 'active')>
            <label for="active" class="custom-control-label">Active</label>
        </div>
        <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="archived" name="status" value="archived"
                @checked(old('status', $category->status) == 'archived')>
            <label for="archived" class="custom-control-label">Archived</label>
        </div>
        @error('status')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button_label }}</button>
</div>
