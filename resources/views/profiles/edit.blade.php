<x-app>
    <form action="{{$user->path('update')}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                Name:
            </label>
            <input
                class="border border-gray-400 p-2 w-full"
                type="text"
                name="name"
                id="name"
                value="{{ $user->name }}"
                required
            >
            @error('name')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                username:
            </label>
            <input
                class="border border-gray-400 p-2 w-full"
                type="text"
                name="username"
                id="username"
                required
                value="{{ $user->username }}"
            >
            @error('username')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avatar">
                Avatar:
            </label>
            <div class="flex items-center">
                <input
                    class="border border-gray-400 p-2 w-full"
                    type="file"
                    name="avatar"
                    id="avatar"
                    value="{{ $user->avatar }}"
                >
                <img src="{{ $user->avatar }}" alt="Current_Avatar"
                width="48px"
                style="height: 48px">
            </div>
            @error('avatar')
                <p class="text-red-500 text-xs mt-2">your image must be less than 2 mb</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="banner">
                Banner:
            </label>
            <div class="flex items-center">
                <input
                    class="border border-gray-400 p-2 w-full"
                    type="file"
                    name="banner"
                    id="banner"
                    value="{{ $user->banner }}"
                >
                <img src="{{ $user->banner }}" alt="Current_banner"
                width="48px"
                style="height: 48px">
            </div>
            @error('banner')
                <p class="text-red-500 text-xs mt-2">your image must be less than 2 mb</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                email:
            </label>
            <input
                class="border border-gray-400 p-2 w-full"
                type="email"
                name="email"
                id="email"
                required
                value="{{ $user->email }}"
            >
            @error('email')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                password:
            </label>
            <input
                class="border border-gray-400 p-2 w-full"
                type="password"
                name="password"
                id="password"
                required
            >
            @error('password')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">
                Confirm your password:
            </label>
            <input
                class="border border-gray-400 p-2 w-full"
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                required
            >
            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                class="bg-blue-400 text-white py-2 px-4 hover:bg-blue-500 mr-4"
                type="submit"
            >
                Submit
            </button>
            <a href="{{route('profile',auth()->user())}}" class="hover:undeline">
                Cancel
            </a>
        </div>
    </form>
</x-app>
