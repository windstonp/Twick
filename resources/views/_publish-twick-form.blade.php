<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="/twicks" method="POST">
        @csrf
        <textarea
            name="body"
            class="w-full outline-none"
            placeholder="what's up?"
            required
        ></textarea>
        @error('body')
            <p class="text-sm text-red-500">
                {{$message}}
            </p>
        @enderror
        <hr class="my-4">
        <footer class="flex justify-between items-center">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="avatar"
                class="rounded-full mr-2"
                width="50"
                style="height: 50px"
            >
            <div >
                <button
                    type="submit"
                    class="bg-blue-500 rounded-lg shadow py-2 px-10 text-sm hover:bg-blue-700 text-white"
                    >
                        Make a twik
                </button>
            </div>

        </footer>

    </form>
</div>
