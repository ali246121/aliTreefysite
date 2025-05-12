<div class="max-w-md mx-auto p-4 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">{{ __('User Profile') }}</h2>

    @if (session()->has('message'))
        <div class="alert alert-success mb-4 text-sm">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updateProfile" class="space-y-4">
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
