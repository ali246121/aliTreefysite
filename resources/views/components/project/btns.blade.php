{{-- resources/views/components/project/btns.blade.php --}}
@props(['user' => auth()->user(), 'projectId' => null])

<div class="flex items-center gap-2">
    @if($user->ownProject($projectId))
        <a href="{{ route('project', $projectId) }}"
           class="btn btn-sm btn-warning">
            {{ __('Edit') }}
        </a>
        <a href="{{ route('projectVerifications', $projectId) }}"
           class="btn btn-sm btn-outline">
            {{ __('View Verifications') }}
        </a>
    @elseif($user->isTranslator())
        @if($user->translator->isEnrolled($projectId))
            <button wire:click="unEnroll({{ $projectId }})"
                    class="btn btn-sm btn-error text-white">
                {{ __('Unenroll') }}
            </button>
            <button wire:click="startVerification({{ $projectId }})"
                    class="btn btn-sm btn-success text-white">
                {{ __('Verify') }}
            </button>
        @else
            <button wire:click="enroll({{ $projectId }})"
                    class="btn btn-sm btn-info text-white">
                {{ __('Enroll') }}
            </button>
        @endif
    @endif
</div>
