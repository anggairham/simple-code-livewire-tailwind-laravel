<div>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-2xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
                <div class="p-8 sm:p-10 lg:flex-auto">
                    <div>
                        @if (session()->has('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-800 dark:text-green-400" role="alert">
                            <span class="font-medium">Success alert!</span> {{ session('success') }}
                        </div>
                        @endif
                    </div>
                    <div>
                        @if (session()->has('error'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                            <span class="font-medium">Danger alert!</span>{{ session('error') }}
                        </div>
                        @endif
                    </div>
                    <div class="mt-1 flex items-center gap-x-4">

                        <div class="mx-auto max-w-2xl sm:text-center">
                            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Simple Code</h2>
                        </div>
                    </div>
                    <form wire:submit.prevent="login" class="mx-auto mt-16 max-w-xl sm:mt-20">
                        <div class="grid grid-cols-1 gap-x-8 gap-y-6">
                            <div>
                                <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                                <div class="mt-2.5">
                                    <input wire:model="email" type="email" name="email" id="email" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-8 gap-y-6">
                            <div>
                                <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">Password</label>
                                <div class="mt-2.5">
                                    <input wire:model="password" type="password" name="password" id="password" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>