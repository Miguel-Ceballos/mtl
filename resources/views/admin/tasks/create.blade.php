<x-sidebar class="flex justify-center py-36 sm:mx-0">
    <div class="flex flex-col w-3/4 md:max-w-4xl xl:w-full items-center justify-center bg-gray-800 rounded-md pt-16 md:pt-16 sm:pt-16 md:px-10 xl:px-10">
        <div class="container xl:max-w-4xl mx-auto px-4">
            <h1 class="text-xl md:text-2xl font-bold text-sky-100 text-center uppercase xl xl:text-4xl">Create a new Task</h1>
            <form method="POST" action="{{ route('tasks.store', $page->slug) }}" class="mt-16" novalidate>
                @csrf
                <div class="mt-10">
                    <x-input-label for="description" :value="__('Description')" class="pl-1"/>

                    <x-text-input id="description" class="block mt-1 w-full"
                                  type="text"
                                  name="description"
                                  value="{{old('description')}}"
                                  required
                                  autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="mt-10">
                    <x-input-label for="status_id" :value="__('Status')" class="pl-1"/>

                    <select name="status_id" id="status_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->status }}</option>
                        @endforeach
                    </select>
                </div>

                <x-primary-button class="my-10">
                    {{ __('Create') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-sidebar>
