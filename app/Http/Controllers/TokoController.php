<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toko = Toko::all();
        $user = User::all();
        return view('toko.index', compact('toko','user'));
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
        $input = $request->all();
        //  validator
        $validasi = Validator::make($input,[
            'toko_name' => 'required|max:128|min:5|string',
            'desc_toko' => 'required',
            'toko_categorie' => 'required',
            'open_date' => 'required',
            'open' => 'required',
            'close' => 'required',
            'toko_icon' => 'required|mimes:jpeg, jpg, png, svg',
        ]);
        if($validasi->fails())
        {
            return back()->withErrors($validasi)->withInput();
        }
        // input untuk hari 
        // gambar icon toko
        if($request->hasFile('toko_icon'))
        {
            $folder = "public/image/toko";
            $gambar = $request->file('toko_icon');
            $nama_gambar = $gambar->getClientOriginalName(); 
            $path = $request->file('toko_icon')->storeAs($folder, $nama_gambar);
            $input['toko_icon'] = $nama_gambar; 
        }

        // konversi nilai array ke dalam string : 

        $hari = implode(',', $request->input('open_date'));
        $input['open_date'] = $hari;

        Toko::create($input);
        return back();

        // dd($input);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Toko::find($id);
        return view('toko.detail', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         // Fetch data for the toko with ID $id
         $tokoData = YourModel::findOrFail($id);

         // Fetch all users or filter for sellers based on your logic
         $users = YourUser::all(); // Replace with your user fetching logic
 
         return view('edit-toko', [
             'data' => $tokoData,
             'user' => $users,
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Toko $toko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Toko $toko)
    {
        //
    }
}
