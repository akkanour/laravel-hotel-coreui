<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$user_id = Auth::user()->id;
        $personnel = Personnel::all();
        //return response()->json($personnel);
        return view('gestion-personnel')->with('personnels',$personnel);
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
        $user = User::create([
            'email' => $request->input('email'),
            'name' => $request->input('nom') . ' ' . $request->input('prenom'),
            'password' => Hash::make('password'),
            'role' => 'personnel'
        ]);

        $personnel = new Personnel();
        $personnel->nom = $request->input('nom');
        $personnel->prenom = $request->input('prenom');
        $personnel->adresse = $request->input('adresse');
        $personnel->numTel = $request->input('numTel');
        $personnel->typePoste = $request->input('typePoste');
        $personnel->user_id = $user->id;
        $personnel->save();
        return redirect()->back()->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personnel = Personnel::find($id);
        return response()->json($personnel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $personnel = Personnel::find($id);
        $personnel->nom = $request->input('nom');
        $personnel->prenom = $request->input('prenom');
        $personnel->adresse = $request->input('adresse');
        $personnel->numTel = $request->input('numTel');
        $personnel->typePoste = $request->input('typePoste');
        $personnel->save();
        return redirect()->back()->with('success', 'Data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personnel = Personnel::find($id);
        if($personnel){
        $personnel->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
    return response()->json(['error' => 'Data not found']);
    }
}
