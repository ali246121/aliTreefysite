<div>
    <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ __($data['title']) }}</h2>

    @if(isset($data['href']))
        <div class="mb-4">
            <a href="{{ $data['href'] }}" class="btn btn-sm btn-primary">
                {{ __('+ Add Project') }}
            </a>
        </div>
    @endif

    <ul class="space-y-2">
        @foreach($projects as $project)
            <li wire:key="translation-{{ $project->id }}"
                class="p-3 bg-base-200 rounded hover:bg-base-300 transition flex justify-between items-center">
                <div>
                    {{ $project->name }} {{ $project->getPercentage() }}%
                </div>
                <x-project.btns :projectId="$project->id" />
            </li>
        @endforeach
    </ul>

    <div class="mt-6">
        {{ $projects->links() }}
    </div>
</div>
