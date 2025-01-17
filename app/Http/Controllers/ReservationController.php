<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Auth::user()::with('destinations')->get();
        return view('reservations.index', compact('reservations'));
    }
}
