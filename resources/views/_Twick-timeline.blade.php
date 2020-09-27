<div class="border border-gray-300 rounded-lg">
    @forelse ($twicks as $twick )
        @include('_twick')
    @empty
        <p class="p-4">No twicks yet!</p>
    @endforelse
</div>
{{ $twicks->links() }}
