@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <img class="img-thumbnail m-3" src="{{asset('/storage/img/'.basename($doctor->photo))}}" alt="Card image cap">
            </div>
        </div>
        <div class="col-md-8">
            <div class="m-3">
                <h3 class="card-title mt-3 blue-text"><i class="fas fa-user-md"></i>{{ucfirst(trans($doctor->name))}}</h3>
                <h4 class="card-title"><i class="fa-solid fa-stethoscope"></i> {{ucfirst(trans($doctor->speciality))}}</h4>
                <p class="card-text"><i class="fa-solid fa-location-dot"></i> {{$doctor->address}}</p>
                <p class="card-text">{{$doctor->experience}}</p>
                <a href="/doctor/{{$doctor->id}}/booking/create" class="btn btn-primary">Book Now</a>
                @if($user->isAdmin)
                    <a href="/doctor/{{$doctor->id}}/booking" class="btn btn-secondary">Bookings</a>
                    <a href="/doctor/{{$doctor->id}}/edit" class="btn btn-outline-success">Edit</a>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                @endif
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="delModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delModalLabel">Confirm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this entry ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form class="d-inline-flex" action="/doctor/{{$doctor->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button  type="submit" name="submit" value="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
