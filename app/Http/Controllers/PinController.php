<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\Http\Request;

class PinController extends Controller
{
    public function index()
    {
        // Send pins to the Blade view
        return view('home', ['pins' => Pin::latest()->get()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'message' => 'required|string'
        ]);

        $pin = Pin::create($validated);

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        Pin::findOrFail($id)->delete();
        return redirect()->route('home')->with('success', 'Pin deleted successfully!');
    }

    public function showHome()
    {
        $pins = \App\Models\Pin::latest()->get();
        return view('home', compact('pins'));
    }

    public function update(Request $request, $id)
    {
        $pin = Pin::findOrFail($id);
        $pin->message = $request->input('message');
        $pin->save();

        return redirect()->route('home')->with('success', 'Pin edited successfully!');
    }


}
