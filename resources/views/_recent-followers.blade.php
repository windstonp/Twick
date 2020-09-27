
<h2 class="font-bold text-xl mb-4">Following</h2>
<ul>
    @forelse (auth()->user()->follows as $user)
        <li class="{{$loop->last ? '' : 'mb-4'}}">
            <div>
                <a href="{{ route('profile', $user) }}" class="flex text-sm items-center">
                    <img
                        src="{{$user->avatar}}"
                        alt="avatar"
                        class="rounded-full mr-2"
                        width="40"
                        style="height:40px"
                    >
                    <div>
                        <p class="text-sm font-bold">
                            {{$user->name}}
                        </p class="">
                        <p class="text-xs">
                            {{'@'.$user->username}}
                        </p>
                    </div>
                </a>
            </div>
        </li>
    @empty
        No followers yet!
    @endforelse
</ul>
