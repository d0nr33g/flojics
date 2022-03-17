<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function list_all(): Response
    {
        return \response()->view('booking.list', ['data' => Booking::all()]);
    }

    public function index(Doctor $doctor): Response
    {
        $this->check_admin();
        return \response()->view('booking.index',[
            'user' => Auth::user(),
            'data' => Booking::all(),
            'doctor' => $doctor,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Doctor $Doctor): Response
    {
        return \response()->view('booking.create', ['doctor' => $Doctor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request , Doctor $Doctor): RedirectResponse
    {
        $user = Auth::user();
        $booking = new Booking();
        $booking->belongsTo($Doctor);
        $booking->belongsTo($user);
        $booking->doctor_id = $Doctor->id;
        $booking->user_id = $user->id;
        $booking->date = $request->input('date');
        $booking->time = $request->input('time');
        $booking->username = $user->name;
        $booking->doctor_name = $Doctor->name;
        $booking->save();
        return response()->redirectTo('/doctor/'.$Doctor->id);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Doctor $Doctor, Booking $booking): Response
    {
        //
        return \response()->view('booking.edit',['doctor' => $Doctor,'booking' => $booking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Doctor $Doctor, Booking $booking): Response
    {
        $this->check_admin();
        //
        return \response();
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Doctor $Doctor, Booking $booking): Response
    {
        $this->check_admin();
        //
        return \response();
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Doctor $Doctor, Booking $booking): Response
    {

        //
        return \response();
    }
}
