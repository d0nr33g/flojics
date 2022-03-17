@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <img src="{{asset("img/doctor2.png")}}" class="img-fluid">
        </div>
        <div class="col-md-6 p-5 shadow-sm bg-white">
            <h4 class="mb-4 blue-text">Book Doctor :</h4>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <img class="img-thumbnail flo-img-sm" src="{{asset('/storage/img/'.basename($doctor->photo))}}" alt="Card image cap">
            <h3 class="card-title mt-3 blue-text"><i class="fas fa-user-md"></i>{{ucfirst(trans($doctor->name))}}</h3>
            <h4 class="card-title"><i class="fa-solid fa-stethoscope"></i> {{ucfirst(trans($doctor->speciality))}}</h4>
            <p class="card-text"><i class="fa-solid fa-location-dot"></i> {{$doctor->address}}</p>
            <p class="card-text">{{$doctor->experience}}</p>

           <form action="/doctor/{{$doctor->id}}/booking" method="POST" class="ps-4 flo-create">
               @csrf
               <div class="mb-2">
                   <i class="fa-solid fa-calendar"></i>
                   <label>Day</label>
               </div>
               <input type="date" class="form-control" name="date" required>

               <div class="mb-2">
                   <i class="fa-solid fa-clock"></i>
                   <label>Time</label>
               </div>
               <input type="time" name="time" class="form-control" required >
               <button type="submit" class="btn btn-primary">Submit</button>
           </form>

        </div>


    </div>
</div>
@endsection
