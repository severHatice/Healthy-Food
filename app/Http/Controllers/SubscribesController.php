<?php

namespace App\Http\Controllers;

use App\Models\Subscribes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribesController extends Controller
{
    public function showSubscribes(){
        return view('footer');
    }

    public function subscribes(Request $request)
    {
        $validatedata = $request->validate([
                        'email' => 'required|email',
        ]);

         Subscribes::create($validatedata);

         return redirect()->back()->with('sussess', 'Message sent successfully!');
    }

   
}
