@component('layouts.card',['card_header' => 'Post Details'])
    @slot('card_body')
    <table class="table">
        <tr>
            <td>title</td>
            <td>{{ $post->title }}</td>
        </tr>
        <tr>
            <td>content</td>
            <td>{{ $post->content }}</td>
        </tr>
        <tr>
            <td>Created At</td>
            <td>{{ $post->created_at->format("d/m/Y H:i:s") }}</td>
        </tr>
        <tr>
            <td>Updated At</td>
            <td>{{ $post->updated_at->diffForHumans() }}</td>
        </tr>        
    </table> 
    
    <a href="{{ route('posts.index', $post->id) }}" 
        class="btn btn-sm btn-info">
        Back
    </a>
    @endslot
@endcomponent