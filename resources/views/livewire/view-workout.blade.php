<div>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $wokout->name }}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                                {{ $wokout->name }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400">
                                {{ $wokout->description }}
                            </p>
                        </div>
                        <div>
                            <a href="#" class="text-blue-500 dark:text-blue-400">Edit</a>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                            Exercises
                        </h4>
                        <ul class="mt-2">
                            @foreach ($wokout->exercises as $exercise)
                                <li class="flex justify-between">
                                    <div>
                                        <h5 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
                                            {{ $exercise->name }}
                                        </h5>
                                        <p class="text-gray-600 dark:text-gray-400">
                                            {{ $exercise->description }}
                                        </p>
                                    </div>
                                    <div>
                                        <a href="#" class="text-blue-500 dark:text-blue-400">Edit</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
