<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function loadHistoryContent()
{
    // $preference = UserPreference::where('user_id', Auth::id())->first();
    return view('partials.history_content');
}
}
