<x-app-layout>
<<<<<<< HEAD

    <div class="container py-32 px-20"></div>
=======
    <div class="container mx-auto px-20 py-6">

        @if (session()->has('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success!</span> {{ session('success') }}
                </div>
            </div>
        @endif


        <div class="w-full max-w-2xl mx-auto max-h-full">
            <!-- Modal content -->
            <form class="bg-white rounded-lg shadow dark:bg-gray-700" method="POST" action="/user/{{ $user->id }}">
                @csrf
                @method('PUT')
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="modal_title">
                        Edit User
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="username" id="username"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan nama.." required=""
                                value="{{ old('username', $user->username) }}" disabled>
                            @error('username')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                        class="font-small">{{ $message }}</span> </p>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="example@gmail.com" required="" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                        class="font-small">{{ $message }} </span></p>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                            <input type="text" name="phone" id="phone"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nomor diawali 08" required="" value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                        class="font-small">{{ $message }} </span></p>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="saldo"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saldo</label>
                            <input type="number" name="saldo" id="saldo"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Saldo user.." required="" value="{{ old('saldo', $user->saldo) }}">
                            @error('number')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                        class="font-small">{{ $message }} </span></p>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="level"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                            <select id="level" name="level"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="basic" {{ old('level', $user->level) == 'basic' ? 'selected' : '' }}>
                                    Basic</option>
                                <option value="premium"
                                    {{ old('level', $user->level) == 'premium' ? 'selected' : '' }}>Premium
                                </option>
                                <option value="admin" {{ old('level', $user->level) == 'admin' ? 'selected' : '' }}>
                                    Admin</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select id="status" name="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="active" {{ old('level', $user->level) == 'basic' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="nonactive"
                                    {{ old('level', $user->level) == 'basic' ? 'selected' : '' }}>Non Active</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="password"
                                class="password-label block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                <span class="text-red-500">(Opsional)</span>
                            </label>
                            <input type="password" name="password" id="password"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="••••••••">
                            @error('password')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                        class="font-small">{{ $message }} </span></p>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                    <a href="/user"
                        class="block text-white bg-yellow-600 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-700 dark:hover:bg-yellow-800 dark:focus:ring-yellow-800">Back
                    </a>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                        User
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>

    @include('admin.user.script')
>>>>>>> d6f18e496e2c680a80ace80a7b2409cf043d6105

</x-app-layout>
