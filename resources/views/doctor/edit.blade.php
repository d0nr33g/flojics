@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <img src="{{asset("img/doctor2.png")}}" class="img-fluid">
        </div>
        <div class="col-md-6 p-5 shadow-sm bg-white">
            <h4 class="mb-4 blue-text">Edit Doctor</h4>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
           <form action="/doctor/{{$doctor->id}}" method="POST" class="ps-4" enctype="multipart/form-data">
               @method('PUT')
               @csrf
               <div class="mb-2">
                   <i class="fa fa-user"></i>
                   <label>Full Name</label>
               </div>
               <input name="name" type="text" placeholder="John Doe" class="form-control mb-4 @error('name') is-invalid @enderror" value="{{$doctor->name}}">
               <div class="mb-2">
                   <i class="fa fa-envelope"></i>
                   <label>Email</label>
               </div>
               <input name="email" type="email" placeholder="email@example.com" class="form-control mb-4 @error('email') is-invalid @enderror" value="{{$doctor->email}}">

               <div class="mb-2">
                   <i class="fa-solid fa-location-dot"></i>
                   <label>Address</label>
               </div>
               <input name="address" type="text" placeholder="123 Maple Street Any town, PA 17101" class="form-control mb-4 @error('address') is-invalid @enderror" value="{{$doctor->address}}">

               <div class="mb-2">
                   <i class="fa-solid fa-phone"></i>
                   <label>Phone</label>
               </div>
               <input name="phone" type="text" placeholder="+201001122334" class="form-control mb-4 @error('phone') is-invalid @enderror" value="{{$doctor->phone}}">

               <div class="mb-2">
                   <i class="fa-solid fa-user-doctor"></i>
                   <label>Speciality</label>
               </div>
               <select name="speciality" class="form-control mb-4 @error('speciality') is-invalid @enderror" >
                   <option></option>
                   <option @if(($doctor->speciality) == 'dermatology' ) selected @endif value="dermatology">Dermatology</option>
                   <option @if(($doctor->speciality) == 'dentistry' ) selected @endif value="dentistry">Dentistry</option>
                   <option @if(($doctor->speciality) == 'psychiatry' ) selected @endif value="psychiatry">Psychiatry</option>
                   <option @if(($doctor->speciality) == 'pediatrics' ) selected @endif value="pediatrics">Pediatrics & New Born</option>
                   <option @if(($doctor->speciality) == 'neurology' ) selected @endif value="neurology">Neurology</option>
                   <option @if(($doctor->speciality) == 'orthopedics' ) selected @endif value="orthopedics">Orthopedics</option>
                   <option @if(($doctor->speciality) == 'gynaecology' ) selected @endif value="gynaecology">Gynaecology & Infertility</option>
                   <option @if(($doctor->speciality) == 'ear, nose & throat' ) selected @endif value="ear, nose & throat">Ear, Nose & Throat</option>
                   <option @if(($doctor->speciality) == 'cardiology' ) selected @endif value="cardiology">Cardiology & Vascular Disease</option>
               </select>
               <div class="mb-2">
                   <i class="fa-solid fa-image"></i>
                   <label for="photo">Photo</label>
               </div>

               <input type="file" id="photo" name="photo">
               <div class="mb-2">
                   <i class="fa-solid fa-id-card-clip"></i>
                   <label>Experience</label>
               </div>
               <textarea class="form-control mb-4 @error('experience') is-invalid @enderror" name="experience" rows="3" >{{$doctor->experience}}</textarea>
               <button type="submit" class="btn btn-primary">Submit</button>
           </form>

        </div>


    </div>
</div>
@endsection
