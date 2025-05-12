<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PinController extends Controller
{
    // Display all pins
    public function index()
    {
        // Pass all pins to the home view
        return view('home', ['pins' => Pin::latest()->get()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string',
        ]);
    
        $validated['user_id'] = Auth::id();
        $validated['name'] = Auth::user()->email;
    
        Pin::create($validated);
    
        // Remove the dd() completely
        return redirect()->route('home')->with('success', 'Pin added successfully!');
    }
    
    // Update an existing pin
    public function update(Request $request, $id)
    {
        $pin = Pin::findOrFail($id);

        // Check if the authenticated user owns the pin
        if ($pin->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $pin->update($validated);

        return redirect()->route('home')->with('success', 'Pin edited successfully!');
    }

    // Delete a pin
    public function destroy($id)
    {
        $pin = Pin::findOrFail($id);

        // Check if the authenticated user owns the pin
        if ($pin->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $pin->delete();

        return redirect()->route('home')->with('success', 'Pin deleted successfully!');
    }
}
