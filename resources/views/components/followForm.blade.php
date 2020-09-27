@if(current_user()->isNot($user))
<form method="POST" action="/profile/{{ $user->username }}/follows">
    @csrf
    <button
        type="submit"
        class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white text-xs"
    >
        {{current_user()->following($user) ? 'Unfollow' :'Follow'}}
    </button>
</form>
@endif
