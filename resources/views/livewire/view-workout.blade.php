<div>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $workout->name }}
    </h2>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-gray-900 dark:text-gray-100">
                    <div class="mt-2">
                        <h4 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                            Exercises
                        </h4>
                        <ul class="mt-2 grid grid-cols-4 gap-4">
                            @foreach ($exercises as $exerciseName => $sets)
                                <li class="py-2">
                                    <div class="w-full">
                                        <h3 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
                                            {{ $exerciseName }}
                                        </h3>
                                    </div>
                                    @foreach($sets as $set)
                                        <ul class="">
                                            <li class="flex flex-row items center py-2">
                                                <div class="">
                                                    <p class="text-gray-600 dark:text-gray-400">
                                                        {{ $set['reps'] }} reps @ {{ $set['weight'] }}
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
