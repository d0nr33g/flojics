<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->view('doctor.index', [
            'data' => Doctor::all(),
            'user' => Auth::user()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->check_admin();
        return response()->view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->check_admin();
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:doctors|max:255|email',
            'address' => 'required|max:255',
            'phone' => 'required|max:20',
            'speciality' => 'required|max:255',
            'experience' => 'required|max:255',
        ]);
        if ($request->isMethod('post')) {
            $doc = new Doctor;
            $doc->name = $request->input('name');
            $doc->email = $request->input('email');
            $doc->address = $request->input('address');
            $doc->phone = $request->input('phone');
            $doc->speciality = $request->input('speciality');
            $doc->experience = $request->input('experience');
            $doc->photo = $request->file('photo')->store('public/img','');
            $doc->save();
            return redirect()->route('doctor.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Doctor $doctor
     * @return Response
     */
    public function show(Doctor $doctor): Response
    {
        return response()->view('doctor.single', [
            'doctor' => $doctor,
            'user' => Auth::user()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Doctor $doctor
     * @return Response
     */
    public function edit(Doctor $doctor): Response
    {
        $this->check_admin();
        return response()->view('doctor.edit', ['doctor' => $doctor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Doctor $doctor
     * @return RedirectResponse
     */
    public function update(Request $request, Doctor $doctor): RedirectResponse
    {
        $this->check_admin();
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->experience = $request->experience;
        if($request->file('photo')){
            $doctor->photo = $request->file('photo')->store('public/img','');
        }
        $doctor->save();
        return response()->redirectTo('/doctor/'.$doctor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Doctor $doctor
     * @return RedirectResponse
     */
    public function destroy(Doctor $doctor): RedirectResponse
    {
        $this->check_admin();
        $doctor->delete();
        return redirect()->route('doctor.index');
    }
}
