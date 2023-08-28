<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        return view('management.history.history', [
            'title' => 'history'
            ]);
    }
}
