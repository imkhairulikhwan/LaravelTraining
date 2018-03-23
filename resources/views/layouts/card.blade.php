@extends('components.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ $card_header }}
            </div>
            <div class="card-body">
                {{ $card_body }}
            </div>
        </div>
    </div>
@endsection


