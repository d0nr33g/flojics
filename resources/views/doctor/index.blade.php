@extends('layouts.app')

@section('content')
<div class="container">
        @if($user->isAdmin)
            <a href="/doctor/create" class="btn btn-primary">+ New Doctor</a>
        @endif
        <doctor-index  :data="{{$data}}"></doctor-index>

</div>
@endsection
