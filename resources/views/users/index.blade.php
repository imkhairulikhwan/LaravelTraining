@component('layouts.card',['card_header' => 'User Management'])
    @slot('card_header') 
        <div class="row">
            <div class="col-4">
                Users Management
            </div>  
            <div class="col-4">
                    <input id="search" type="text" class="form-control" name="search_user">
            </div>                  
            <div class="col-4 justify-content-end text-right">
                <a href="{{ route('users.create')}}" class="btn btn-sm btn-primary">Create New User</a>
            </div>
        </div>
    @endslot    
    @slot('card_body')
        <div class="row justify-content-end">
            {{ $users->links() }}
            <small class="text-muted pt-2 pr-3 pl-3">
                    Page {{ $users->currentPage() }} / {{ $users->lastPage()}}
            </small>
        </div>        
        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ ($key + 1) + ($users->currentPage() - 1) * $users->perPage() }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="btn-group"></div>
                        <a href="{{ route('users.show', $user->id) }}" 
                            class="btn btn-sm btn-info">
                            Show
                        </a>
                        <a href="{{ route('users.edit', $user->id) }}" 
                            class="btn btn-sm btn-primary">
                            Edit
                        </a>
                        <div onclick="if(confirm('Are you sure want to delete {{ $user->name }}?')){
                                    document.getElementById('delete-form-{{ $user->id }}').submit();
                                }" 
                        class="btn btn-sm btn-danger">
                            Delete
                        <form id="delete-form-{{$user->id}}" action="{{ route('user.destroy', $user->id)}}"
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
                        <p>Are you sure you want to delete this user?</p>
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