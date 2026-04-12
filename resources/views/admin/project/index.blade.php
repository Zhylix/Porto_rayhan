@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Projects</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <button onclick="openModal('addModal')" class="flex bg-blue-500 text-white px-4 py-2 rounded mb-4">
        <i data-lucide="plus" class="mr-1"></i> Add Project
    </button>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Image</th>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Description</th>
                <th class="border px-4 py-2">Link</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td class="border text-center px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border text-center px-4 py-2">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-20 h-12 object-cover rounded">
                    @else
                        -
                    @endif
                </td>
                <td class="border text-center px-4 py-2">{{ $project->title }}</td>
                <td class="border px-4 py-2">{{ $project->description }}</td>
                <td class="border text-center px-4 py-2">
                    @if($project->link)
                        <a href="{{ $project->link }}" target="_blank" class="text-blue-500 underline">Link</a>
                    @else
                        -
                    @endif
                </td>
                <td class="flex items-center justify-center px-5 py-2 space-x-2">
                    <button onclick='openEditModal(@json($project))' class="flex items-center justify-center bg-yellow-500 text-white px-2 py-1 rounded">
                        <i data-lucide="wrench" class="w-4 h-4 mr-1"></i>
                        Edit
                    </button>
                    <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this project?')" class="flex items-center justify-center bg-red-500 text-white px-2 py-1 rounded">
                            <i data-lucide="trash" class="w-4 h-4 mr-1"></i>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded w-96">
        <h2 class="text-xl font-bold mb-4">Add Project</h2>
        <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Title" class="border p-2 w-full mb-2" required>
            <textarea name="description" placeholder="Description" class="border p-2 w-full mb-2"></textarea>
            <input type="url" name="link" placeholder="Link Github" class="border p-2 w-full mb-2">

            <label class="block mb-2">Image</label>
            <input type="file" name="image" accept="image/*" id="add_image" class="border p-2 w-full mb-2">
            <div class="mb-2">
                <img id="add_preview" src="" class="w-32 h-20 object-cover rounded hidden" alt="Preview">
            </div>

            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" onclick="closeModal('addModal')" class="flex items-center justify-center bg-gray-500 text-white px-4 py-2 rounded">
                    <i data-lucide="x" class="w-4 h-4 mr-1"></i>
                    Cancel
                </button>
                <button type="submit" class="flex items-center justify-center bg-blue-500 text-white px-4 py-2 rounded">
                    <i data-lucide="save" class="h-4 w-4 mr-1"></i>
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded w-96">
        <h2 class="text-xl font-bold mb-4">Edit Project</h2>
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" id="edit_title" class="border p-2 w-full mb-2" required>
            <textarea name="description" id="edit_description" class="border p-2 w-full mb-2"></textarea>
            <input type="url" name="link" id="edit_link" class="border p-2 w-full mb-2">

            <label class="block mb-2">Image</label>
            <input type="file" name="image" accept="image/*" id="edit_image" class="border p-2 w-full mb-2">
            <div class="mb-2">
                <img id="edit_preview" src="" class="w-32 h-20 object-cover rounded hidden" alt="Preview">
            </div>

            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" onclick="closeModal('editModal')" class="flex items-center justify-center bg-gray-500 text-white px-4 py-2 rounded">
                    <i data-lucide="x" class="w-4 h-4 mr-1"></i>
                    Cancel
                <button type="submit" class="flex items-center justify-center bg-yellow-500 text-white px-4 py-2 rounded">
                    <i data-lucide="save" class="h-4 w-4 mr-1"></i>
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Global modal helpers for inline onclick handlers
    window.openModal = function(id) {
        const el = document.getElementById(id);
        if (el) el.classList.remove('hidden');
    };

    window.closeModal = function(id) {
        const modal = document.getElementById(id);
        if (modal) modal.classList.add('hidden');

        // Reset add modal inputs and preview
        if (id === 'addModal') {
            const addForm = document.querySelector('#addModal form');
            if (addForm) addForm.reset();
            const addPreview = document.getElementById('add_preview');
            if (addPreview) {
                addPreview.src = '';
                addPreview.classList.add('hidden');
            }
            const addImage = document.getElementById('add_image');
            if (addImage) addImage.value = '';
        }

        // Reset edit modal selected file but keep displayed preview
        if (id === 'editModal') {
            const editImage = document.getElementById('edit_image');
            if (editImage) editImage.value = '';
        }
    };

    function previewFile(input, previewId) {
        const file = input.files && input.files[0];
        const preview = document.getElementById(previewId);
        if (!preview) return;
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.classList.add('hidden');
        }
    }

    const addImageInput = document.getElementById('add_image');
    if (addImageInput) addImageInput.addEventListener('change', function() { previewFile(this, 'add_preview'); });

    const editImageInput = document.getElementById('edit_image');
    if (editImageInput) editImageInput.addEventListener('change', function() { previewFile(this, 'edit_preview'); });

    window.openEditModal = function(project) {
        openModal('editModal');
        const form = document.getElementById('editForm');
        if (form) form.action = `/admin/project/${project.id}`;
        document.getElementById('edit_title').value = project.title;
        document.getElementById('edit_description').value = project.description ?? '';
        document.getElementById('edit_link').value = project.link ?? '';

        const preview = document.getElementById('edit_preview');
        if (project.image) {
            preview.src = '/storage/' + project.image;
            preview.classList.remove('hidden');
        } else {
            preview.src = '';
            preview.classList.add('hidden');
        }
    };
});
</script>

@endsection
