<div class="max-w-md mx-auto p-4 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Translator Profile</h2>

    @if (session()->has('message'))
        <div class="p-2 mb-4 bg-green-100 text-green-800 rounded">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="updateProfile" enctype="multipart/form-data">
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input wire:model="name" type="text" class="w-full p-2 border rounded">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input wire:model="email" type="email" class="w-full p-2 border rounded">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Languages (comma separated)</label>
            <input wire:model.defer="languages" type="text" class="w-full p-2 border rounded" placeholder="e.g. English, Spanish, German">
            @error('languages') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Upload CV</label>
            <input wire:model="cv" type="file" class="w-full p-2 border rounded">
            @error('cv') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>

    <div class="mt-4">
        <a href="{{ route('password.request') }}" class="text-blue-600 underline">Change Password</a>
    </div>
</div>
