<div>
    @if ($translation)
        <div class="mb-6">
            <div class="text-lg font-semibold mb-4">
                {{ $translation->value }}
            </div>

            <div class="flex flex-col gap-4">
                @forelse ($verifications as $verification)
                    <div class="card bg-base-100 shadow-sm p-4">
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center gap-3">
                                <div class="text-sm font-semibold text-gray-800">
                                    {{ optional($verification->translator?->user)->name ?? __('Unknown Translator') }}
                                </div>

                                <div class="badge {{ $verification->is_correct ? 'badge-success' : 'badge-error' }}">
                                    {{ $verification->is_correct ? __('Correct') : __('Incorrect') }}
                                </div>

                                <button wire:click="selectVerification({{ $verification->id }})"
                                    class="btn btn-xs btn-outline">
                                    {{ __('Select') }}
                                </button>
                            </div>

                            @if (!$verification->is_correct)
                                <div class="text-sm text-red-600">
                                    {{ optional($verification->updatedTranslation)->value ?? __('No update provided') }}
                                </div>
                                <div class="text-sm text-red-500">
                                    {{ optional($verification->updatedTranslation)->translate ?? '' }}
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-sm text-gray-400">
                        {{ __('No verifications available for this translation.') }}
                    </div>
                @endforelse
            </div>
        </div>
    @else
        <div class="text-sm text-gray-400">
            {{ __('No Verification.') }}
        </div>
    @endif
</div>
