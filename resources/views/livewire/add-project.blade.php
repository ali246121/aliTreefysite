<div class="max-w-2xl mx-auto p-6 bg-white rounded-xl shadow-md">
    <form wire:submit.prevent="import" class="space-y-6">
        {{-- Flash Messages --}}
        @if (session()->has('success'))
            <div class="alert alert-success text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-error text-sm">
                {{ session('error') }}
            </div>
        @endif

        {{-- Project Name --}}
        <div class="form-control">
            <label for="project_name" class="label">
                <span class="label-text">{{ __('Project Name') }}</span>
            </label>
            <input type="text" wire:model="project_name" id="project_name"
                   class="input input-bordered w-full" />
            @error('project_name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Project Description --}}
        <div class="form-control">
            <label for="project_description" class="label">
                <span class="label-text">{{ __('Project Description') }}</span>
            </label>
            <textarea wire:model="project_description" id="project_description"
                      class="textarea textarea-bordered w-full h-24 resize-none"></textarea>
            @error('project_description') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Points per Word --}}
        <div class="form-control">
            <label for="points_per_word" class="label">
                <span class="label-text">{{ __('Points per Word') }}</span>
            </label>
            <input type="number" wire:model="points_per_word" id="points_per_word"
                   class="input input-bordered w-full" />
            @error('points_per_word') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Verifications per Word --}}
        <div class="form-control">
            <label for="verifications_per_word" class="label">
                <span class="label-text">{{ __('Verifications per Word') }}</span>
            </label>
            <input type="number" wire:model="verifications_per_word" id="verifications_per_word"
                   class="input input-bordered w-full" />
            @error('verifications_per_word') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Upload ZIP --}}
        <div class="form-control">
            <label for="zip_file" class="label">
                <span class="label-text">{{ __('Upload ZIP File') }}</span>
            </label>
            <input type="file" wire:model="zip_file" id="zip_file" accept=".zip"
                   class="file-input file-input-bordered w-full" />
            @error('zip_file') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Submit Button --}}
        <div class="pt-4">
            <button type="submit" class="btn btn-primary w-full">
                {{ __('Import Translations') }}
            </button>
        </div>
    </form>
</div>
