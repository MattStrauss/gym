<div>
    <div class="flex justify-between items-center mb-3">
        <h1 class="text-2xl font-bold">Past Workouts</h1>
        <a href="#" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">New Workout</a>
    </div>
    <div class="mt-4">
        <table class="w-full table-auto border-separate border-spacing-y-5">
            <thead>
                <tr>
                    <th class="text-left">Name</th>
                    <th class="text-left">Completed at</th>
                    <th class="text-left">Duration</th>
                    <th class="text-left"># Reps</th>
                    <th class="text-left">Total Weight</th>
                    <th class="text-left">View</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workouts as $workout)
                    <tr>
                        <td>{{ $workout->name }}</td>
                        <td>{{ $workout->completed_at->format('m/d/Y') }}</td>
                        <td>{{ $workout->duration }}</td>
                        <td>{{ $workout->reps }}</td>
                        <td>{{ $workout->total_weight }}</td>
                        <td class="flex">
                            <a href="#">
                                <x-heroicon-o-arrow-right-end-on-rectangle class="cursor-pointer ml-2 w-8 h-8" />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
{{--        {{ $workouts->links() }}--}}
    </div>
</div>
