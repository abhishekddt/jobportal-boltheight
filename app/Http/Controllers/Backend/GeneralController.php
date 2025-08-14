<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Industry;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Log;
use App\Models\Backend\FuncationalArea;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GeneralController extends Controller
{
    public function index()
    {
        try {
            $industries = Industry::all();
            $areas = FuncationalArea::with('industry')->paginate(20);
            return view('backend.general.index', compact('industries', 'areas'));
        } catch (\Exception $e) {
            Log::error($e);
            abort('500');
        }
    }

    public function storeIndustries(Request $request)
    {
        try {
            $validated = $request->validate([
                'industry_name' => 'required|string|max:255|unique:industries,name',
            ]);

            Industry::create([
                'name' => $validated['industry_name']
            ]);

            return redirect()->back()->with('success', 'Industry created successfully.');
        } catch (\Exception $e) {
            Log::error('Error storing industry: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            abort('500');
        }
    }

    public function updateIndustries(Request $request, $encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            $industry = Industry::findOrFail($id);

            $validated = $request->validate([
                'edit_industry_name' => 'required|string|max:255|unique:industries,name,' . $id,
            ]);

            $industry->update([
                'name' => trim($validated['edit_industry_name'])
            ]);

            return response()->json(['message' => 'Industry updated successfully.']);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            \Log::error('Decryption failed for industry ID: ' . $encryptedId, ['exception' => $e]);
            return response()->json(['message' => 'Invalid ID.'], 400);
        } catch (\Exception $e) {
            \Log::error('Error updating industry: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'An unexpected error occurred.'], 500);
        }
    }

    public function destroyIndustry(Request $request, $encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            $industry = Industry::findOrFail($id);

            $industry->delete();
            return redirect()->back()->with('success', 'Industry deleted successfully.');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'Could not delete industry.');
        }
    }

    public function storeFunctionalArea(Request $request)
    {
        try {
            $validated = $request->validate([
                'industry_id' => 'required|exists:industries,id',
                'functional_area' => 'required|string|max:255|unique:funcational_areas,name,',
            ]);

            FuncationalArea::create([
                'industry_id' => $validated['industry_id'],
                'name' => $validated['functional_area']
            ]);
            return redirect()->back()->with('success', 'Functional area saved successfully.');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'Something went wrong while saving. Please try again.');
        }

    }

    public function updateFunctionalArea(Request $request, $encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            $area = FuncationalArea::findOrFail($id);

            $request->validate([
                'industry_id' => 'required|exists:industries,id',
                'functional_area' => 'required|string|max:255|unique:funcational_areas,name,' . $area->id,
            ]);

            $area->update([
                'industry_id' => $request->industry_id,
                'name' => $request->functional_area,
            ]);

            return redirect()->back()->with('success', 'Functional Area updated successfully.');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    public function destroyFunctionalArea(Request $request, $encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            $area = FuncationalArea::findOrFail($id);

            $area->delete();
            return redirect()->back()->with('success', 'Functional area deleted successfully.');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'Could not delete functional area.');
        }
    }
}