@component('layouts.card',['card_header' => 'User Details'])
    @slot('card_body')
    <table class="table">
        <tr>
            <td>Name</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td>Created At</td>
            <td>{{ $user->created_at->format("d/m/Y H:i:s") }}</td>
        </tr>
        <tr>
            <td>Updated At</td>
            <td>{{ $user->updated_at->diffForHumans() }}</td>
        </tr>        
    </table> 
    
    <a href="{{ route('static.users', $user->id) }}" 
        class="btn btn-sm btn-info">
        Back
    </a>
    @endslot
@endcomponent