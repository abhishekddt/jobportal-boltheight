<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Degree;
use Illuminate\Support\Facades\Log;


class DegreeController extends Controller
{
    // public function index()
    // {
    //     $degrees = Degree::all();
    //     return view('degrees.index', compact('degrees'));
    // }

    public function create(Request $request)
    {

        // return $request;
        $validate = $request->validate([
            'name' => 'required|string|max:25',
        ]);

        Degree::create([
            'name' => $request->name,
            'description' => $request->description ?? null,
            'status' => $request->status ?? 1,
        ]);

        return back()->with('success', 'Degree created successfully');
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $degree = Degree::findOrFail($id);
            $degree->update([
                'status' => $request->status ?? 1,
            ]);

            return response()->json(['success' => true, 'message' => 'Degree status updated successfully']);
        } catch (\Exception $e) {
            Log::error('Status update error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to update status'], 500);
        }
    }
}
