<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::all();
        //return response()->json($client);
        return view('gestion-client')->with('clients',$client);
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
            'password' => Hash::make('password')
        ]);

            $client = new Client();
            $client->nomClient = $request->input('nomClient');
            $client->prenomClient = $request->input('prenomClient');
            $client->gsm = $request->input('gsm');
            $client->user_id = $user->id;
            $client->save();
            return redirect()->back()->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);
        return response()->json($client);
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

        $client = Client::find($id);
        $client->nomClient = $request->input('nomClient');
        $client->prenomClient = $request->input('prenomClient');
        $client->gsm = $request->input('gsm');
        $client->save();
        return redirect()->back()->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        if($client){
            $client->delete();
            return redirect()->back()->with('success', 'Data deleted successfully');
        }
        return redirect()->back()->with('error', 'Data not found');
    }
}
