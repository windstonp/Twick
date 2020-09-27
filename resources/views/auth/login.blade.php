<x-master>
    <div class=" flex justify-center ">
        <div class="mx-auto px-16 py-8 bg-gray-200 rounded-lg border border-gray-400">
            <div class="col-md-8">
                <div class="card">
                    <div class="font-bold text-lg mb-4">{{ __('Login') }}</div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-6">
                                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    Email:
                                </label>
                                <input
                                    type="email"
                                    autocomplete="email"
                                    class="border border-gray-400 p-2 w-full"
                                    name="email"
                                    value="{{old('email')}}"
                                    id="email"
                                    >
                                @error('email')
                                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    password:
                                </label>
                                <input
                                    type="password"
                                    autocomplete="current-password"
                                    class="border border-gray-400 p-2 w-full"
                                    name="password"
                                    value="{{old('password')}}"
                                    id="password"
                                    >
                                @error('password')
                                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <div>
                                    <input
                                        type="checkbox"
                                        name="remenber"
                                        id="remenber"
                                        class="mr-1"
                                        {{old('remember') ? 'checked' : ''}}
                                    >
                                    <label
                                        class="text-xs text-gray-700 font-bold uppercase"
                                        for="remenber"
                                    >
                                        Remenber me
                                    </label>
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit"
                                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                                >
                                    Submit
                                </button>
                            </div>
                            <div class="mt-4">
                                <a href="/register" class="block mb-2 uppercase font-bold text-xs text-gray-700 hover:text-gray-900">
                                    não tem uma conta? registre-se aqui!
                                </a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-master>
