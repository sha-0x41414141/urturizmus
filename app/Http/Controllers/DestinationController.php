<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

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
    }

    public function update()
    {
        
    }

    public function delete(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->back()->with('success', 'Destination deleted.');
    }
}
