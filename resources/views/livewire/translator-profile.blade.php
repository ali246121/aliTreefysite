<div class="max-w-md mx-auto p-4 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">{{ __('Translator Profile') }}</h2>

    @if (session()->has('message'))
        <div class="alert alert-success mb-4 text-sm">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updateProfile" enctype="multipart/form-data" class="space-y-4">

        {{-- Name --}}
        <div class="form-control">
            <label class="label">
                <span class="label-text">{{ __('Name') }}</span>
            </label>
            <input wire:model="name" type="text" class="input input-bordered w-full" />
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Email --}}
        <div class="form-control">
            <label class="label">
                <span class="label-text">{{ __('Email') }}</span>
            </label>
            <input wire:model="email" type="email" class="input input-bordered w-full" />
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Languages --}}
        <div class="form-control">
            <label class="label">
                <span class="label-text">{{ __('Languages (comma separated)') }}</span>
            </label>
            <input wire:model.defer="languages" type="text"
                   class="input input-bordered w-full"
                   placeholder="{{ __('e.g. English, Spanish, German') }}" />
            @error('languages') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- CV Upload --}}
        <div class="form-control">
            <label class="label">
                <span class="label-text">{{ __('Upload CV') }}</span>
            </label>
            <input wire:model="cv" type="file" class="file-input file-input-bordered w-full" />
            @error('cv') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary w-full">
            {{ __('Save') }}
        </button>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ route('password.request') }}" class="link link-primary">
            {{ __('Change Password') }}
        </a>
    </div>
</div>
