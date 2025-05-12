<div>
    @if (!$is_translator)
        @include('user.set-role')
    @else
        <form wire:submit.prevent="save" class="space-y-6">
            {{-- CV Upload --}}
            <div class="form-control">
                <label class="label">
                    <span class="label-text">{{ __('CV Upload') }}</span>
                </label>
                <input type="file" wire:model="cv" class="file-input file-input-bordered w-full" />
                @error('cv') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Description --}}
            <div class="form-control">
                <label class="label">
                    <span class="label-text">{{ __('Description') }}</span>
                </label>
                <textarea wire:model="desc" class="textarea textarea-bordered w-full"></textarea>
                @error('desc') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Preferred Language --}}
            <div class="form-control">
                <label class="label">
                    <span class="label-text">{{ __('Preferred Language') }}</span>
                </label>
                <select wire:model="selectedLanguages" class="select select-bordered w-full" multiple>
                    @foreach ($languages as $lang)
                        <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                    @endforeach
                </select>
                @error('language_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Submit Button --}}
            <div class="pt-4">
                <button type="submit" class="btn btn-primary w-full">
                    {{ __('Submit') }}
                </button>
            </div>
        </form>
    @endif
</div>
