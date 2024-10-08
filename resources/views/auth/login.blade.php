<x-layout>
    <x-slot:heading> Log in</x-slot:heading>
    <form method="POST" action='/login'>
        @csrf
        <div class="space-y-8">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input for="email" name="email" type="email" :value="old('email')" required/>
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

                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Login</x-form-button>
        </div>
    </form>

</x-layout>
