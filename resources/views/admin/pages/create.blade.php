<x-sidebar>
    <div class="flex flex-col w-full h-full items-center justify-center">
        <div class="flex flex-col items-center justify-center w-3/4 h-3/4 rounded-lg">
            <div class="container xl:max-w-4xl mx-auto px-4">
                <h1 class="text-xl md:text-2xl font-bold text-sky-100 text-center uppercase xl xl:text-4xl">Create a new page</h1>
                <form method="POST" action="{{ route('page.store') }}" class="mt-10" novalidate>
                    @csrf
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')" />

                        <x-text-input id="name" class="block mt-1 w-full"
                                      type="text"
                                      name="name"
                                      value="{{old('name')}}"
                                      required
                                      autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-4">
                        {{ __('Create') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-sidebar>
