<div class="card-body">

    <x-form.input label="Name" type="text" name="name" :value="$category->name" />

    <x-form.select label="Parent Category" name="parent_id" class="categories" :options="$parents" :selected="$category->parent_id">
        <option value="">Primary Category</option>
    </x-form.select>

    <x-form.textarea label="Description" name="description" :value="$category->description" rows="3" />

    <x-form.image label="Image" type="file" name="image" :value="$category->image" />

    <x-form.radio name="status" :options="['active' => 'Active', 'archived' => 'Archived']" :checked="$category->status">Status</x-form.radio>

</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button_label }}</button>
</div>
