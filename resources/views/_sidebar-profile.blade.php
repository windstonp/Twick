<ul>
    <li>
        <a
            href="{{route('home')}}"
            class="font-bold text-lg mb-4 block"
        >
            Home
        </a>
    </li>
    <li>
        <a
            href="/find"
            class="font-bold text-lg mb-4 block"
        >
            Find users
        </a>
    </li>
    <li>
        <a
            href="{{route('profile',auth()->user())}}"
            class="font-bold text-lg mb-4 block"
        >
            Profile
        </a>
    </li>
    <li>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="font-bold text-lg mb-4 block">
                Logout
            </button>
        </form>
    </li>
</ul>
