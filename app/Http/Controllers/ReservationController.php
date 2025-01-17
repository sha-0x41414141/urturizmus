<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ReservationController extends Controller
{
    public function index()
    {
        $userlogged = Auth::user();
        $reservations = User::where('id', '=', $userlogged->id)->first()->destinations()->get();
        return view('reservations.index', compact('reservations'));
    }
}
