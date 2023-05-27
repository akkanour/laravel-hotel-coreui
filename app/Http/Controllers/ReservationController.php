<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation = Reservation::all();
        //return response()->json($reservation);
        return view('gestion-reservation')->with('reservations',$reservation);
    }
    public function indexClient()
    {
        $reservations = Reservation::all();
        return view('client-reservation')->with('reservations', $reservations);
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
        $validatedData = $request->validate([
            'chambre_id' => 'required',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
        ]);

        // Créer une nouvelle réservation avec les données validées
        $reservation = Reservation::create([
            'chambre_id' => $validatedData['chambre_id'],
            'dateDebut' => $validatedData['dateDebut'],
            'dateFin' => $validatedData['dateFin'],
            'client_id' => auth()->user()->id,
        ]);

        // Rediriger vers la page de détails de la réservation créée
        return redirect()->route('gestion-reservation', $reservation->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('gestion-reservation', compact('reservation'));
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
        $validatedData = $request->validate([
            'client_id' => 'required',
            'chambre_id' => 'required',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
        ]);

        // Mettre à jour la réservation avec les données validées
        $reservation = Reservation::findOrFail($id);
        $reservation->update($validatedData);

        // Rediriger vers la page de détails de la réservation mise à jour
        return redirect()->route('gestion-reservation', $reservation->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        // Rediriger vers la liste des réservations
        return redirect()->route('gestion-reservation');
    }
}
