@props(['thread' => $thread])

<a href="{{ route('threads.show', $thread) }}" class="p-4 block grid bg-white sm:rounded-lg border-1 shadow-sm">
    <span>
        {{ $thread->title }}
    </span>
    <span class="text-gray-600 text-sm">
        {{ $thread->created_at->diffForHumans() }}
    </span>
    <form action="{{route('thread.destroy',$thread)}}" method="post">
      @csrf
      @method('DELETE')
      <button type="submit" class="text-blue-500">{{__('Delete')}}</button>
    </form>
</a>