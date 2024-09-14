<x-layout>
    <x-slot:heading> Register</x-slot:heading>
    <form method="POST" action=''>
        @csrf
        <div class="space-y-8">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input for="first_name" name="first_name" required/>
                        </div>
                        <x-form-error name="first_name"/>
                    </x-form-field>

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input for="last_name" name="last_name" required/>
                        </div>
                        <x-form-error name="last_name"/>
                    </x-form-field>

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input for="email" name="email" type="email" required/>
                        </div>
                        <x-form-error name="email"/>
                    </x-form-field>

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input for="password" name="password" type="password" required/>
                        </div>
                        <x-form-error name="password"/>
                    </x-form-field>

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input for="password_confirmation" name="password_confirmation" type="password"
                                          required/>
                        </div>
                        <x-form-error name="password_confirmation"/>
                    </x-form-field>


                </div>
            </div>


        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Register</x-form-button>
        </div>
    </form>

</x-layout>
