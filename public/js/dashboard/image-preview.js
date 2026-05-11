document.getElementById('image').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    document.querySelector('label[for="image"]').textContent = file.name;

    const reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById('preview-img').src = e.target.result;
        document.getElementById('image-preview').style.display = 'inline-block';
    };
    reader.readAsDataURL(file);
});

document.getElementById('remove-image').addEventListener('click', function () {
    document.getElementById('image').value = '';
    document.querySelector('label[for="image"]').textContent = 'Choose image';
    document.getElementById('image-preview').style.display = 'none';
    document.getElementById('preview-img').src = '';
});