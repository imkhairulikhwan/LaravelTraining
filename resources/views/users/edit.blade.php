@component('layouts.card',['card_header' => 'Edit User Details'])
    @slot('card_body')

    <form action="{{ route('users.update', $user->id)}}" method="POST">
        @csrf
        {{ method_field('PATCH') }}
        <table class="table">
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" class="form-control" id="name" name="name"
                    value="{{ $user->name }}">
                </td>
            </tr>
        </table>
        <div class="form-group">
            <button type="submit" name="button" class="btn btn-success btn-sm">Submit</button>
            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm ml-2">Back</a>
        </div>
    </form>    
    @endslot
@endcomponent