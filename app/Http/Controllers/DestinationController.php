<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination' => 'required|string',
            'price' => 'required|integer|min:0',
            'departure' => 'required|date'
        ]);

        Destination::create($request->all());

        return redirect()->back()->with('success', 'Destination added.');
    }

    public function book(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        $user = Auth::user();
        $destination->users()->attach($user->id);
    }

    public function show(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        return view('destinations.show', compact('destination'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'destination' => 'required|string',
            'price' => 'required|integer|min:0',
            'departure' => 'required|date'
        ]);
        
        $destination = Destination::findOrFail($id);
        $destination->destination = $request->destination;
        $destination->price = $request->price;
        $destination->departure = $request->departure;
        $destination->save();

        return redirect('/destinations')->with('success', 'Destination updated.');
    }

    public function delete(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->back()->with('success', 'Destination deleted.');
    }
}
