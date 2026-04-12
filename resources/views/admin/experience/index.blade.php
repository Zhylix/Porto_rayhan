@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Experience</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <!-- Add Button -->
    <button onclick="openModal('addModal')" class="flex items-center justify-center bg-blue-500 text-white px-4 py-2 rounded mb-4">
        <i data-lucide="plus" class="mr-1"></i>
        Add Experience
    </button>

    <!-- Table -->
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Company</th>
                <th class="border px-4 py-2">Position</th>
                <th class="border px-4 py-2">Start Year</th>
                <th class="border px-4 py-2">End Year</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($experiences as $experience)
            <tr>
                <td class="border text-center px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border text-center px-4 py-2">{{ $experience->company }}</td>
                <td class="border text-center px-4 py-2">{{ $experience->position }}</td>
                <td class="border text-center px-4 py-2">{{ $experience->start_year }}</td>
                <td class="border text-center px-4 py-2">{{ $experience->end_year ?? '-' }}</td>
                <td class="border text-center flex items-center justify-center px-4 py-2 space-x-2">
                    <button onclick="openEditModal({{ $experience }})" class="flex items-center justify-center bg-yellow-500 text-white px-2 py-1 rounded">
                        <i data-lucide="wrench" class="w-4 h-4 mr-1"></i>
                        Edit
                    </button>
                    <form action="{{ route('admin.experience.destroy', $experience->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this experience?')" class="flex items-center justify-center bg-red-500 text-white px-2 py-1 rounded">
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
        <h2 class="text-xl font-bold mb-4">Add Experience</h2>
        <form action="{{ route('admin.experience.store') }}" method="POST">
            @csrf
            <input type="text" name="company" placeholder="Company" class="border p-2 w-full mb-2" required>
            <input type="text" name="position" placeholder="Position" class="border p-2 w-full mb-2" required>
            <input type="number" name="start_year" placeholder="Start Year" class="border p-2 w-full mb-2" min="1900" max="{{ date('Y') }}" required>
            <input type="number" name="end_year" placeholder="End Year" class="border p-2 w-full mb-2" min="1900" max="{{ date('Y') }}">
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
        <h2 class="text-xl font-bold mb-4">Edit Experience</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="company" id="edit_company" class="border p-2 w-full mb-2" required>
            <input type="text" name="position" id="edit_position" class="border p-2 w-full mb-2" required>
            <input type="number" name="start_year" id="edit_start_year" class="border p-2 w-full mb-2" min="1900" max="{{ date('Y') }}" required>
            <input type="number" name="end_year" id="edit_end_year" class="border p-2 w-full mb-2" min="1900" max="{{ date('Y') }}">
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
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}
function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}
function openEditModal(experience) {
    openModal('editModal');
    const form = document.getElementById('editForm');
    form.action = `/admin/experience/${experience.id}`;
    document.getElementById('edit_company').value = experience.company;
    document.getElementById('edit_position').value = experience.position;
    document.getElementById('edit_start_year').value = experience.start_year;
    document.getElementById('edit_end_year').value = experience.end_year ?? '';
}
</script>
@endsection
