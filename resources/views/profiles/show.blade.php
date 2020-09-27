<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <div
                class="flex items-center rounded-lg"
                style="max-height: 200px; overflow:hidden;"
            >
                <img
                    src="{{$user->banner}}"
                    alt="banner"
                    class="rounded-lg mb-2"
                >
            </div>
            <img
                src="{{ $user->avatar }}"
                alt="avatar"
                class="rounded-full mr-2 absolute bottom-0 border-4 border-white transform -translate-x-1/2 translate-y-16"
                width="150"
                style="left:50%;height:150px"
            >
        </div>
        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 250px">
                <h2 class="font-bold text-2xl ">
                    {{$user->name}}
                </h2 class="text-sm">
                <p class="text-xs">Joined at {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="flex items-center">
                @can('edit',$user)
                    <a href="{{current_user()->path('edit')}}" class="rounded-full border border-blue-300 py-2 px-2 text-black text-xs mr-2">
                        Edit Profile
                    </a>
                    <form
                        action="{{current_user()->path('delete')}}"
                        class="rounded-full border border-red-400 py-2 px-2 text-black text-xs mr-2"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')
                        <button >
                            Delete Account
                        </button>
                    </form>
                @endcan
                <x-followForm :user="$user">

                </x-followForm>
            </div>
        </div>
        <p class="text-sm text-center">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi cupiditate provident blanditiis molestias ab a facilis. Laborum quod quam veniam natus laboriosam, velit exercitationem sequi blanditiis iste quasi pariatur? Officiis!
        </p>


    </header>

    @include('_Twick-timeline',[
        'twicks' => $twicks
    ])


</x-app>
