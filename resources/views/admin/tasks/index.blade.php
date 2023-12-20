<x-sidebar class="flex p-2 xl:pt-10">
    <div class="flex flex-col w-full md:w-full md:h-full xl:w-full xl:h-full rounded-md">
        <div class="flex flex-col w-full md:w-full xl:w-full items-center justify-center">
            <div class="container xl:max-w-7xl mx-auto">

                <div class="flex flex-row items-center mb-8">
                    <h1 class="text-white font-semibold text-2xl xl:text-4xl mr-6 uppercase">{{ $page->name }}</h1>

                    <!-- Page settings dropdown -->
                    <div class="sm:flex sm:items-center pt-1">
                        <x-dropdown align="bottom" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="w-7 h-7 flex bg-gray-600 justify-center items-center rounded-full hover:bg-gray-700"
                                    type="button">
                                    <svg
                                        class="transition duration-75 dark:text-gray-100 group-hover:text-gray-900 dark:group-hover:text-white "
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        version="1.1" viewBox="0 0 512 512" width="15" height="15">
                                        <g>
                                            <circle cx="256" cy="53.333" r="53.333"/>
                                            <circle cx="256" cy="256" r="53.333"/>
                                            <circle cx="256" cy="458.667" r="53.333"/>
                                        </g>
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <button data-modal-target="edit-page-modal" data-modal-toggle="edit-page-modal"
                                        class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out"
                                        type="button">
                                    Edit
                                </button>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('page.destroy', $page) }}">
                                    @method('DELETE')
                                    @csrf
                                    <x-dropdown-link :href="route('page.destroy', $page)"
                                                     onclick="event.preventDefault();
                                                                                this.closest('form').submit();">
                                        {{ __('Delete') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>

                <div class="grid grid-cols-2 xl:grid-cols-4 gap-4 xl:gap-8 items-center">
                    <div class="items-center justify-center bg-emerald-500 rounded-lg p-4">
                        <p class="flex flex-row text-white font-medium items-center">
                            <svg class="mr-2 w-5 h-5 xl:w-10 xl:h-10 pt-1 text-white" aria-hidden="true"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                 viewBox="0 0 24 24">
                                <path
                                    d="m12,0C5.383,0,0,5.383,0,12s5.383,12,12,12,12-5.383,12-12S18.617,0,12,0Zm-.091,15.419c-.387.387-.896.58-1.407.58s-1.025-.195-1.416-.585l-2.782-2.696,1.393-1.437,2.793,2.707,5.809-5.701,1.404,1.425-5.793,5.707Z"/>
                            </svg>
                            Tasks done
                        </p>
                        <p class="text-2xl xl:text-5xl text-white mt-2">{{ count($tasksDone) }}</p>
                    </div>
                    <div class="items-center justify-center bg-yellow-500 rounded-lg p-4">
                        <p class="flex flex-row text-white font-medium items-center">
                            <svg class="mr-2 w-5 h-5 xl:w-10 xl:h-10 pt-1 text-white" aria-hidden="true"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                 viewBox="0 0 24 24">
                                <path
                                    d="M12,0C5.383,0,0,5.383,0,12s5.383,12,12,12,12-5.383,12-12S18.617,0,12,0Zm4,13h-4c-.552,0-1-.447-1-1V6c0-.553,.448-1,1-1s1,.447,1,1v5h3c.553,0,1,.447,1,1s-.447,1-1,1Z"/>
                            </svg>
                            Tasks in progress
                        </p>
                        <p class="text-2xl xl:text-5xl text-white mt-2">{{ count($tasksInProgress) }}</p>
                    </div>
                    <div class="items-center justify-center bg-rose-500 rounded-lg p-4">
                        <p class="flex flex-row text-white font-medium items-center">
                            <svg class="mr-2 w-5 h-5 xl:w-10 xl:h-10 pt-1 text-white" aria-hidden="true"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                 viewBox="0 0 24 24">
                                <path
                                    d="M17,0H7C4.243,0,2,2.243,2,5v14c0,2.757,2.243,5,5,5h10c2.757,0,5-2.243,5-5V5c0-2.757-2.243-5-5-5Zm-7,19c0,.552-.448,1-1,1h-2c-.552,0-1-.448-1-1v-2c0-.552,.448-1,1-1h2c.552,0,1,.448,1,1v2Zm0-6c0,.552-.448,1-1,1h-2c-.552,0-1-.448-1-1v-2c0-.552,.448-1,1-1h2c.552,0,1,.448,1,1v2Zm0-6c0,.552-.448,1-1,1h-2c-.552,0-1-.448-1-1v-2c0-.552,.448-1,1-1h2c.552,0,1,.448,1,1v2Zm7,12h-4c-1.308-.006-1.307-1.994,0-2h4c1.308,.006,1.307,1.994,0,2Zm0-6h-4c-1.308-.006-1.307-1.994,0-2h4c1.308,.006,1.307,1.994,0,2Zm0-6h-4c-1.308-.006-1.307-1.994,0-2h4c1.308,.006,1.307,1.994,0,2Z"/>
                            </svg>
                            Tasks to do
                        </p>
                        <p class="text-2xl xl:text-5xl text-white mt-2">{{ count($tasksToDo) }}</p>
                    </div>
                    <div class="items-center justify-center bg-violet-500 rounded-lg p-4">
                        <p class="flex flex-row text-white font-medium items-center">
                            <svg class="mr-2 w-5 h-5 xl:w-10 xl:h-10 pt-1 text-white" aria-hidden="true"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                 viewBox="0 0 24 24"><title>07-Chart</title>
                                <path d="M14.414,13l6.745,6.745A11.945,11.945,0,0,0,23.95,13Z"/>
                                <path d="M11.293,12.707h0L11,12.414V.05a12,12,0,1,0,8.745,21.109Z"/>
                                <path d="M13,11H23.95A11.99,11.99,0,0,0,13,.05Z"/>
                            </svg>
                            Full percentage
                        </p>
                        <p class="text-2xl xl:text-5xl text-white mt-2">
                            @if(count($page->tasks) > 0)
                                {{ round(count($tasksDone) * 100 / count($page->tasks), 1) }}%
                            @else
                                0%
                            @endif
                        </p>
                    </div>
                </div>

                <div class="flex flex-row items-center mb-4">

                    <div>
                        <!-- Main modal -->
                        <div id="edit-page-modal" tabindex="-1" aria-hidden="true"
                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="edit-page-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit
                                            Page</h3>
                                        <form method="POST" action="{{ route('page.store') }}" class="mt-10"
                                              novalidate>
                                            @csrf
                                            <div class="mt-4">
                                                <x-input-label for="description" :value="__('Name')" class=""/>
                                                <input type="text"
                                                       name="name"
                                                       value="{{old('name', $page->name)}}"
                                                       id="name"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                       required
                                                       autocomplete="name">
                                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                            </div>
                                            <button type="submit"
                                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 uppercase">
                                                Create page
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 xl:flex xl:items-center">
                    <div class="w-full xl:w-32">
                        <!-- Modal toggle -->
                        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                                class="inline-flex items-center w-full xl:w-32 px-4 py-3 bg-emerald-700 dark:bg-violet-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-emerald-600 dark:hover:bg-violet-600 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                type="button">
                            <svg
                                class="flex-shrink-0 w-3 h-3 text-white mr-2 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 512 512">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M480,224H288V32c0-17.673-14.327-32-32-32s-32,14.327-32,32v192H32c-17.673,0-32,14.327-32,32s14.327,32,32,32h192v192   c0,17.673,14.327,32,32,32s32-14.327,32-32V288h192c17.673,0,32-14.327,32-32S497.673,224,480,224z"/>
                            </svg>
                            New task
                        </button>
                    </div>


                    <!-- Main modal -->
                    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="authentication-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="2"
                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">New
                                        task</h3>
                                    <form method="POST" action="{{ route('tasks.store', $page->slug) }}"
                                          class="mt-10" novalidate>
                                        @csrf
                                        <div class="mt-4">
                                            <x-input-label for="description" :value="__('Description')"
                                                           class=""/>
                                            <input type="text"
                                                   name="description"
                                                   value="{{old('description')}}"
                                                   id="description"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                   required
                                                   autocomplete="description">
                                            <x-input-error :messages="$errors->get('description')"
                                                           class="mt-2"/>
                                        </div>


                                        <div class="mt-4">
                                            <x-input-label for="status_id" :value="__('Status')" class=""/>

                                            <select name="status_id" id="status_id"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach($statuses as $status)
                                                    <option
                                                        value="{{ $status->id }}">{{ $status->status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 uppercase">
                                            Create task
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full xl:w-32">
                        <div x-data="{ show: false}" @click.away="show = false" class="xl:mr-4">
                            <button class="text-gray-300 bg-gray-600 rounded-md p-2 w-full xl:w-40 text-left"
                                    @click="show = ! show">{{isset($currentStatus) ? ucwords($currentStatus->status) : 'Statuses'}}
                            </button>

                            <div class="">
                                <div x-show="show"
                                     class="absolute bg-gray-600 grid w-[calc(50%-1.5rem)] xl:w-40 mt-1 rounded-md overflow-auto xl:max-h-52"
                                     style="display: none">
                                    <div class="w-auto">
                                        <a href="{{ route('tasks', $page->slug) }}"
                                           class="block leading-7 text-gray-200 hover:bg-gray-500 hover:text-white focus:bg-gray-500 px-2">All</a>
                                        @foreach($statuses as $status)
                                            <a href="/tasks/{{ $page->slug }}/?status_id={{ $status->id }}&{{ http_build_query(request()->except('status_id')) }}"
                                               class="block leading-7 hover:bg-gray-500 hover:text-white text-gray-200 focus:bg-gray-500 px-2 @if(isset($currentStatus) && $currentStatus['id'] == $status->id) bg-gray-500 : '' @endif">
                                                {{ ucwords($status->status) }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        {{--                    <div class="flex justify-center items-center">--}}
                        <form id="formSearch" action="{{ route('tasks', $page->slug) }}" method="GET">
                            <div class="flex justify-center items-center">
                                @if(request('status_id'))
                                    <input type="hidden" name="status_id" value="{{ request('status_id') }}">
                                @endif

                                <div class="relative max-w-sm">
                                    <div
                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div><input datepicker datepicker-autohide type="text"
                                            id="date"
                                            name="date"
                                            value="{{ request('date') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date"
                                            data-date-format="YYYY MM DD"
                                    ></div>
                            </div>

                        </form>
                    </div>
                    <div>
                        <x-primary-button
                            class="xl:ml-4 dark:bg-gray-800 dark:text-white w-full border-2 dark:border-gray-400 dark:hover:border-gray-200"
                            onclick="document.getElementById('formSearch').submit();"
                            >
                            {{ __('Search') }}
                        </x-primary-button>
                    </div>
                </div>

                <!-- LIST -->

                <ul class="w-full mb-8 mt-4">
                    <li class="py-3 sm:pb-4 bg-gray-700 rounded-md w-full">
                        <div class="flex flex-row px-8">
                            <div class="basis-4/6">
                                <p class="text-sm text-left font-medium text-gray-900 dark:text-white">
                                    Description
                                </p>
                            </div>
                            <div class="basis-1/6">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    Status
                                </p>
                            </div>
                            <div class="basis-1/6">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    Date
                                </p>
                            </div>
                            <div class="basis-1/6">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    Edit
                                </p>
                            </div>
                            <div class="basis-1/6">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    Delete
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>


                @if(count($tasks))
                    <ul class="w-full mb-4">
                        @foreach($tasks as $task)
                            <li class="bg-gray-800 w-full rounded-md hover:bg-gray-600 mb-1">
                                <div class="flex flex-row py-4 px-8">
                                    <div class="basis-4/6">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $task->description }}
                                        </p>
                                    </div>
                                    <div class="basis-1/6">
                                        <p class="flex w-24 h-6 text-sm text-center text-gray-800 font-medium rounded-lg items-center justify-center
                                                    @switch($task->status_id)
                                                        @case(1)
                                                        text-rose-300 border-2 border-rose-500
                                                        @break

                                                        @case(2)
                                                        text-orange-300 border-2 border-orange-500
                                                        @break

                                                        @case(3)
                                                        text-green-300 border-2 border-green-500
                                                        @break

                                                    @endswitch ">{{ $task->status->status }}</p>
                                    </div>
                                    <div class="basis-1/6">
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-400">
                                            {{ date_format($task->created_at,'d-m-Y') }}
                                        </p>
                                    </div>
                                    <div class="basis-1/6">
                                        <!-- Modal toggle -->
                                        <button data-modal-target="edit-modal{{ $task->id }}"
                                                data-modal-toggle="edit-modal{{ $task->id }}"
                                                class="text-sm font-medium text-gray-200 dark:text-gray-400 hover:underline hover:text-indigo-500"
                                                type="button">
                                            Edit
                                        </button>

                                        <!-- Main modal -->
                                        <div id="edit-modal{{ $task->id }}" tabindex="-1" aria-hidden="true"
                                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="edit-modal{{ $task->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                             xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                  stroke-linejoin="round" stroke-width="2"
                                                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                            Edit task</h3>
                                                        <form method="POST"
                                                              action="{{ route('task.update', [$page->slug, $task]) }}"
                                                              class="mt-10" novalidate>
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="mt-4">
                                                                <x-input-label for="description"
                                                                               :value="__('Description')"
                                                                               class=""/>
                                                                <input type="text"
                                                                       name="description"
                                                                       value="{{$task->description}}"
                                                                       id="description"
                                                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                       required
                                                                       autocomplete="description">
                                                                <x-input-error :messages="$errors->get('description')"
                                                                               class="mt-2"/>
                                                            </div>


                                                            <div class="mt-4">
                                                                <x-input-label for="status_id" :value="__('Status')"
                                                                               class=""/>

                                                                <select name="status_id" id="status_id"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @foreach($statuses as $status)
                                                                        <option value="{{ $status->id }}"
                                                                                @if($status->id === $task->status_id) selected @endif>{{ $status->status }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button type="submit"
                                                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 uppercase">
                                                                Edit task
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="basis-1/6">
                                        <form method="POST" action="{{ route('tasks.delete', [$page->slug, $task]) }}"
                                              novalidate>
                                            @method('DELETE')
                                            @csrf
                                            <button
                                                class="text-sm font-medium text-gray-300 dark:text-gray-400 hover:underline hover:text-red-500"
                                                type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <ul class="w-full mb-4">
                        <li class="bg-gray-800 w-full rounded-md hover:bg-gray-600 mb-1">
                            <div class="flex flex-row py-4 px-8 items-center justify-center">
                                <div class="">
                                    <p class="text-sm text-center font-medium text-gray-900 dark:text-white">
                                        There are no tasks
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                @endif
            </div>
            @if(session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                     class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-700 dark:text-green-400 fixed right-6 top-6"
                     role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <p>{{session('success')}}</p>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
                     class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-400 dark:text-red-800 fixed right-6 top-6 font-semibold"
                     role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <p class="font-semibold">{{session('error')}}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-sidebar>
