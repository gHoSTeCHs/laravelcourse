<x-layout>
    <x-slot:heading> Edit: {{$job->career}}</x-slot:heading>
    <form method="POST" action="/jobs/{{$job['id']}}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" id="title" autocomplete="title"
                                       class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                       placeholder="Developer"
                                       required
                                       value="{{$job->career}}"
                                >
                            </div>
                        </div>
                        @error('title')
                        <p class="text-sm font-bold text-red-500 mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text"
                                       name="salary"
                                       id="salary"
                                       autocomplete="salary"
                                       class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                       placeholder="$5000"
                                       required
                                       value="{{$job->salary}}"
                                >
                            </div>
                            @error('salary')
                            <p class="text-sm font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror

                        </div>
                    </div>


                </div>
            </div>


        </div>

        <div class="mt-6 flex items-center justify-between ">
            <div>
                <button type="submit" form="delete_job"
                        class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                    Delete
                </button>
            </div>
            <div>
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update
                </button>
            </div>

        </div>
    </form>

    <form method="POST" action="/jobs/{{$job['id']}}" id="delete_job">
        @csrf
        @method('DElETE')
    </form>

</x-layout>
