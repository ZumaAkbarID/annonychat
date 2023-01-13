<?php

namespace App\Http\Controllers;

use App\Models\MessageHistory;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'title' => 'Dashboard',
            'data' => MessageHistory::all()
        ]);
    }
}