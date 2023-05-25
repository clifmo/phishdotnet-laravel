<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @foreach ($news as $new)
                    <div
                        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
                            <a href="{{ route('news.show', ['id' => $new->id]) }}">{{ $new->title }}</a>
                        </h1>

                        <div class="text-l font-medium text-gray-500 dark:text-gray-300 mt-2">
                            <time>{{ $new->datetime }}</time> by <span>{{ $new->author }}</span>
                        </div>

                        <div class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed overflow-hidden">
                            <div>{!! $new->body !!}</div>
                        </div>
                        <div class="text-s font-medium text-gray-500 dark:text-gray-300 mt-2 text-right">
                            Permalink: <a
                                class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300"
                                href="{{ $new->permalink }}">{{ $new->permalink }}</a>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
