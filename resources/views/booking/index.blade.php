@extends('layouts.app')

@section('content')
<div class="container">
        @if($user->isAdmin)
        <booking-index  :data="{{$data}}" :doctor="{{$doctor}}"></booking-index>
        @endif

</div>

@endsection
