<div class="card-body">

    <div class="form-group">
        <x-form.input label="Name" type="text" name="name" :value="$category->name" />
    </div>

    <div class="form-group">
        <x-form.select label="Parent Category" name="parent_id" class="categories" :options="$parents" :selected="$category->parent_id">
            <option value="">Primary Category</option>
        </x-form.select>
    </div>

    <div class="form-group">
        <x-form.textarea label="Description" name="description" :value="$category->description" rows="3" />
    </div>

    <div class="form-group">
        <x-form.image label="Image" type="file" name="image" :value="$category->image" />
    </div>

    <div class="form-group">
        <x-form.radio name="status" :options="['active' => 'Active', 'archived' => 'Archived']" :checked="$category->status">Status</x-form.radio>
    </div>

</div>

<div class="card-footer">
    <x-form.button type="submit" label="{{ $button_label }}" />
</div>
