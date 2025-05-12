<div>
    @if ($translation)
        <div>
            <div class="text-lg font-semibold mb-4">
                {{ $translation->value }}
            </div>

            <div class="flex flex-col gap-4">
                @forelse ($verifications as $verification)
                    <div class="card bg-base-100 shadow-sm p-4">
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <div class="text-sm font-semibold text-gray-700">
                                    {{ optional($verification->translator?->user)->name ?? __('Unknown Translator') }}
                                </div>

                                <div class="badge {{ $verification->is_correct ? 'badge-success' : 'badge-error' }}">
                                    {{ $verification->is_correct ? __('Correct') : __('Incorrect') }}
                                </div>
                            </div>

                            @if (!$verification->is_correct)
                                <div class="text-sm text-red-600">
                                    {{ optional($verification->updatedTranslation)->value ?? __('No update provided') }}
                                </div>
                                <div class="text-sm text-red-600">
                                    {{ optional($verification->updatedTranslation)->translate ?? '' }}
                                </div>
                            @endif

                            <div>
                                <button wire:click="selectVerification({{ $verification->id }})"
                                    class="btn btn-sm btn-outline">
                                    {{ __('Select') }}
                                </button>
                            </div>
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
