<div>
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Past Workouts</h1>
        <a href="{{ route('workouts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Workout</a>
    </div>
    <div class="mt-4">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left">Date</th>
                    <th class="text-left">Duration</th>
                    <th class="text-left">Distance</th>
                    <th class="text-left">Average Speed</th>
                    <th class="text-left">Calories</th>
                    <th class="text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workouts as $workout)
                    <tr>
                        <td>{{ $workout->completed_at->format('d/m/Y') }}</td>
                        <td>{{ $workout->duration }}</td>
                        <td>{{ $workout->distance }}</td>
                        <td>{{ $workout->average_speed }}</td>
                        <td>{{ $workout->calories }}</td>
                        <td>
                            <a href="{{ route('workouts.edit', $workout) }}" class="text-blue-500">Edit</a>
                            <a href="#" wire:click.prevent="delete({{ $workout->id }})" class="text-red-500 ml-2">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $workouts->links() }}
    </div>
</div>
