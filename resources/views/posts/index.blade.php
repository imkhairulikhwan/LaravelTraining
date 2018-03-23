@component('layouts.card',['card_header' => 'Post Management'])
    @slot('card_header') 
        <div class="row">
            <div class="col-4">
                Posts Management
            </div>  
            <div class="col-4">
                    <input id="search" type="text" class="form-control" name="search_post">
            </div>                  
            <div class="col-4 justify-content-end text-right">
                <a href="{{ route('posts.create')}}" class="btn btn-sm btn-primary">Create New Post</a>
            </div>
        </div>
    @endslot
    @slot('card_body')
        <div class="row justify-content-end">
            {{ $posts->links() }}
            <small class="text-muted pt-2 pr-3 pl-3">
                    Page {{ $posts->currentPage() }} / {{ $posts->lastPage()}}
            </small>
        </div>        
        <table class="table">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
            @foreach ($posts as $key => $post)
                <tr>
                    <td>{{ ($key + 1) + ($posts->currentPage() - 1) * $posts->perPage() }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>
                        <div class="btn-group"></div>
                        <a href="{{ route('posts.show', $post->id) }}" 
                            class="btn btn-sm btn-info">
                            Show
                        </a>
                        <a href="{{ route('posts.edit', $post->id) }}" 
                            class="btn btn-sm btn-primary">
                            Edit
                        </a>
                        <div onclick="if(confirm('Are you sure want to delete {{ $post->name }}?')){
                                    document.getElementById('delete-form-{{ $post->id }}').submit();
                                }" 
                        class="btn btn-sm btn-danger">
                            Delete
                        <form id="delete-form-{{$post->id}}" action="{{ route('posts.destroy', $post->id)}}"
                            method="POST" style="display: none">
                            @csrf
                            {{ method_field('DELETE') }}
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>       
        <div class="modal" id="confirm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Delete Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this post?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Delete</button>
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endslot
@endcomponent