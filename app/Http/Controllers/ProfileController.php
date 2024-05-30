<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'phone_number' => 'required|max:15|min:10',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'profile_photo' => 'required|mimes:png,jpg,jpeg,heic',
            'address' => 'required',
        ]);
        if($validasi->fails())
        {
            return back()->withErrors($validasi)->withInput();
        }

        if($request->hasFile('profile_photo'))
        {
            $folder = "public/image/profile"; // Membuat Folder Penyimpanan
            $image = $request->file('profile_photo'); // Mengambil Data Dari Request File
            $image_name = $image->getClientOriginalName(); // Mengambil Nama File
            $path = $request->file('profile_photo')->storeAs($folder, $image_name); // Menyimpan File
            $data['profile_photo'] = $image_name; // Memberi Nama Yang Dikirim Ke Database
        }

        Profile::create($data); 
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
