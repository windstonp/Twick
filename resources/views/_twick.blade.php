    <div class="flex  p-4 {{ $loop->last ? '' : ' border-b border-b-gray-400 '}}">
        <div class="mr-2 flex-shrink-0">
            <a href="{{ route('profile', $twick->user) }}">
                <img
                    src="{{$twick->user->avatar}}"
                    alt="avatar"
                    class="rounded-full mr-2"
                    width="40"
                    style="height: 40px"
                >
            </a>
        </div>
        <div class="w-full">
            <h5 class="font-bold mb-1 ">
                <a href="{{ route('profile', $twick->user) }}">
                    {{ $twick->user->name }}
                </a>

            </h5>
            <p class="text-sm mb-2">
                {{ $twick->body }}
            </p>
            <p class="text-xs text-gray-600 text-right">{{ $twick->created_at->diffForHumans() }}</p>
            <div class="flex justify-between mt-2">
                <div class="flex ">
                    <form action="/twicks/{{$twick->id}}/like" method="POST">
                        @csrf
                        <button type="submit" class="outline-none">
                            <div class="flex items-center mr-4 {{$twick->isLikedBy(current_user()) ? 'text-blue-500' : 'text-gray-500'}} hover:text-blue-700">
                                <svg viewBox="0 0 20 20" class="mr-1 w-3" style="-webkit-transform: scaleX(-1);
                                transform: scaleX(-1);">
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="icon-shape" class="fill-current">
                                            <path d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z" id="Fill-97"></path>
                                        </g>
                                    </g>
                                </svg>
                                <span class="text-xs">{{$twick->likesNumber ?: 0}}</span>
                            </div>
                        </button>
                    </form>
                    <form action="/twicks/{{$twick->id}}/like" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="outline-none">
                            <div class="flex items-center {{$twick->isDislikedBy(current_user()) ? 'text-red-500' : 'text-gray-500'}} hover:text-red-700">
                                <svg viewBox="0 0 20 20" class="mr-1 w-3 " style="-webkit-transform: scaleY(-1);
                                transform: scaleY(-1);">
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="icon-shape" class="fill-current">
                                            <path d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z" id="Fill-97"></path>
                                        </g>
                                    </g>
                                </svg>
                                <span class="text-xs">{{$twick->dislikesNumber ?: 0}}</span>
                            </div>
                        </button>
                    </form>
                </div>
                <div>
                    @can('destroy', $twick->user)
                        <form action="/twicks/delete/{{$twick->id}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>

