<x-app>
    <div>
        @forelse($users as $user)
            <a href="{{$user->path()}}">
                <div class="flex items-center mb-4">
                        <img
                            src="{{$user->avatar}}"
                            alt="{{$user->username}}"
                            width="60"
                            class="mr-4 rounded-lg"
                            style="height: 60px;"
                        >
                    <div>
                        <h2 class="text-sm font-bold">
                            {{$user->name}}
                        </h2>
                        <h4 class="text-xs">
                            {{'@'.$user->username}}
                        </h4>
                    </div>
                </div>
            </a>
        @empty
            <p>No user available!</p>
        @endforelse
        {{$users->Links()}}
    </div>
</x-app>
