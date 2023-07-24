<x-sidebar class="flex justify-center py-36">
    <div class="flex flex-col w-3/4 md:max-w-4xl xl:w-full items-center justify-center bg-gray-700 rounded-md pt-16 md:pt-16 sm:pt-16 md:px-10 xl:px-10">
            <div class="container xl:max-w-4xl mx-auto px-4">
                <h1 class="text-xl md:text-2xl font-bold text-sky-100 text-center uppercase xl xl:text-4xl">Create a new page</h1>
                <form method="POST" action="{{ route('page.store') }}" class="mt-16" novalidate>
                    @csrf
                    <div class="mt-10">
                        <x-input-label for="name" :value="__('Name')" class="pl-1"/>

                        <x-text-input id="name" class="block mt-1 w-full"
                                      type="text"
                                      name="name"
                                      value="{{old('name')}}"
                                      required
                                      autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <x-primary-button class="my-10">
                        {{ __('Create') }}
                    </x-primary-button>
                </form>
            </div>
    </div>
</x-sidebar>
