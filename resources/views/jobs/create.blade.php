<x-layout>
    <x-slot:heading> Create</x-slot:heading>
    <form method="POST" action="/jobs">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We only need a handful of information from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input for="title" name="title" placeholder="CEO" required/>
                        </div>
                        <x-form-error name="title"/>
                    </x-form-field>

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="title">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input for="salary" name="salary" placeholder="$30,000" required/>
                        </div>
                        <x-form-error name="salary"/>
                    </x-form-field>


                </div>
            </div>


        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Submit</x-form-button>
        </div>
    </form>

</x-layout>
