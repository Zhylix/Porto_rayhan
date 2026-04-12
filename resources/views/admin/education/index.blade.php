@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Education</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <!-- Add Education Button -->
    <button onclick="openModalEducation('addModalEducation')" class="flex items-center justify-center bg-blue-500 text-white px-4 py-2 rounded mb-4">
        <i data-lucide="plus" class="mr-1"></i>
        Add Education
    </button>

    <!-- Education Table -->
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">School</th>
                <th class="border px-4 py-2">Start Year</th>
                <th class="border px-4 py-2">End Year</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($educations as $education)
            <tr>
                <td class="border text-center px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border text-center px-4 py-2">{{ $education->title }}</td>
                <td class="border text-center px-4 py-2">{{ $education->school }}</td>
                <td class="border text-center px-4 py-2">{{ $education->start_year }}</td>
                <td class="border text-center px-4 py-2">{{ $education->end_year ?? '-' }}</td>
                <td class="border text-center flex items-center justify-center px-4 py-2 space-x-2">
                    <button onclick="openEditModalEducation({{ $education }})" class="flex items-center justify-center bg-yellow-500 text-white px-2 py-1 rounded">
                        <i data-lucide="wrench" class="w-4 h-4 mr-1"></i>
                        Edit
                    </button>
                    <form action="{{ route('admin.education.destroy', $education->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this education?')" class="flex items-center justify-center bg-red-500 text-white px-2 py-1 rounded">
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
<div id="addModalEducation" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded w-96">
        <h2 class="text-xl font-bold mb-4">Add Education</h2>
        <form action="{{ route('admin.education.store') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Title" class="border p-2 w-full mb-2" required>
            <input type="text" name="school" placeholder="School" class="border p-2 w-full mb-2" required>
            <input type="number" name="start_year" placeholder="Start Year" min="1900" max="{{ date('Y') }}" class="border p-2 w-full mb-2" required>
            <input type="number" name="end_year" placeholder="End Year" min="1900" max="{{ date('Y') }}" class="border p-2 w-full mb-2">
            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" onclick="closeModalEducation('addModalEducation')" class="flex items-center justify-center bg-gray-500 text-white px-4 py-2 rounded">
                    <i data-lucide="x" class="w-4 h-4 mr-1"></i>
                    Cancel
                </button>
                <button type="submit" class="flex items-center justify-center bg-blue-500 text-white px-4 py-2 rounded">
                    <i data-lucide="save" class="h-4 w-4 mr-1"></i>
                    save
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModalEducation" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded w-96">
        <h2 class="text-xl font-bold mb-4">Edit Education</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title" id="edit_title" class="border p-2 w-full mb-2" required>
            <input type="text" name="school" id="edit_school" class="border p-2 w-full mb-2" required>
            <input type="number" name="start_year" id="edit_start_year" class="border p-2 w-full mb-2" required>
            <input type="number" name="end_year" id="edit_end_year" class="border p-2 w-full mb-2">
            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" onclick="closeModalEducation('editModalEducation')" class="flex items-center justify-center bg-gray-500 text-white px-4 py-2 rounded">
                    <i data-lucide="x" class="w-4 h-4 mr-1"></i>
                    Cancel
                </button>
                <button type="submit" class="flex items-center justify-center bg-yellow-500 text-white px-4 py-2 rounded">
                    <i data-lucide="save" class="h-4 w-4 mr-1"></i>
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModalEducation(id) {
    document.getElementById(id).classList.remove('hidden');
}
function closeModalEducation(id) {
    document.getElementById(id).classList.add('hidden');
}
function openEditModalEducation(education) {
    openModalEducation('editModalEducation');
    const form = document.getElementById('editForm');
    form.action = `/admin/education/${education.id}`;
    document.getElementById('edit_title').value = education.title;
    document.getElementById('edit_school').value = education.school;
    document.getElementById('edit_start_year').value = education.start_year;
    document.getElementById('edit_end_year').value = education.end_year ?? '';
}
</script>
@endsection
