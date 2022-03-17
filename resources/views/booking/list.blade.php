@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 card p-4">
                <booking-list :data="{{$data}}"></booking-list>
            </div>
        </div>
    </div>
@endsection
