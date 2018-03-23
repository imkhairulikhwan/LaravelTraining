@component('layouts.card',['card_header' => 'About Us'])
    @slot('card_body')
        Cleanique coders...
    @endslot
@endcomponent

{{--  @include('layouts.card', ['card_header' => 'About Us', 'card_body' => ' Cleanique coders...'])  --}}