<div class="card" style="margin-bottom: 15px;">
    <div class="card-header">
        {{ $post->id }}. {{ $post->name }}
    </div>
    <div class="card-body">
        @if($post->fileIsImage)
            <img src="{{ $post->fileStoragePath }}" alt="{{ $post->name }}">
        @endif
        <p class="card-text">{{ $post->content }}</p>
            <p class="text-dark">{{ $post->created_at }}</p>
        <a href="{{ route('post.show', $post->id) }}" class="btn btn-success btn-sm">View</a>
        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
        <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline-block">
            @method('delete')
            @csrf
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
</div>
