@component('layouts.card',['card_header' => 'Edit Post Details'])
    @slot('card_body')

    <form action="{{ route('posts.update', $post->id)}}" method="POST">
        @csrf
        {{ method_field('PATCH') }}
        <table class="table">
            
            <tr>
                <td>Title</td>
                <td>
                    <input type="text" class="form-control" id="title" name="title"
                    value="{{ $post->title }}">
                </td>
            </tr>
            <tr>
                <td>Content</td>
                <td>
                    <input type="text" class="form-control" id="content" name="content"
                    value="{{ $post->content }}">
                </td>
            </tr>
        </table>
        <div class="form-group">
            <button type="submit" name="button" class="btn btn-success btn-sm">Submit</button>
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm ml-2">Back</a>
        </div>
    </form>    
    @endslot
@endcomponent