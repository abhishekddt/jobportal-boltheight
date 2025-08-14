<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
class AdminController extends Controller
{
    public function create()
    {
        try {
            return view('backend.auth.login');
        } catch (\Exception $e) {
            abort('500');
        }
    }

    public function loginStore(LoginRequest $request)
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();
            return redirect('admin/dashboard');
        } catch (\Exception $e) {
            abort('500');
        }
    }

    public function adminDashboard()
    {
        try {
            return view('backend.dashboard.index');
        } catch (\Exception $e) {
            abort('500');
        }
    }

    public function adminList()
    {
        try {
            $admins = User::with('getCreatedBy')->where('user_role_id', 2)->orderBy('created_at', 'desc')->paginate(10);
            return view('backend.admins.index', compact('admins'));
        } catch (\Exception $e) {
            abort('500');
        }
    }

    public function toggleAdminStatus(Request $request, $encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);

            $admin = User::where('user_role_id', 2)->findOrFail($id);

            $admin->status = !$admin->status;
            $admin->save();

            return response()->json([
                'success' => true,
                'status' => $admin->status
            ]);

        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'success' => false,
                'message' => 'Failed to update admin status: ' . $e->getMessage()
            ], 500);
        }
    }

    public function createAdmin()
    {
        try {
            return view('backend.admins.create');
        } catch (\Exception $e) {
            abort('500');
        }
    }

    public function storeAdmin(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'first_name' => 'required|max:25|regex:/^[a-zA-Z\s]+$/',
                'last_name' => 'required|max:25|regex:/^[a-zA-Z\s]+$/',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|digits_between:10,15|unique:users,phone',
                'password' => 'required|min:8|confirmed',
            ]);

            if ($validated->fails()) {
                return redirect()->back()
                    ->withErrors($validated)
                    ->withInput();
            }
            $data = $validated->validated();

            User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'name' => $data['first_name'] . ' ' . $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
                'user_role_id' => 2,
                'created_by' => auth()->id(),
            ]);

            return redirect()->route('backend.admin.all_admins')->with('success', 'Admin is created successfully');

        } catch (\Exception $e) {
            Log::error($e);
            abort('500');
        }
    }
    public function editAdmin($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $admin = User::where('user_role_id', 2)->find($id);

            return view('backend.admins.edit', compact('admin'));
        } catch (\Exception $e) {
            Log::error($e);
            abort('500');
        }
    }

    public function updateAdmin(Request $request, $encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $admin = User::where('user_role_id', 2)->find($id);

            $validated = $request->validate([
                'first_name' => 'required|max:25|regex:/^[a-zA-Z\s]+$/',
                'last_name' => 'required|max:25|regex:/^[a-zA-Z\s]+$/',
                'email' => 'required|email|unique:users,email,' . $admin->id,
                'phone' => 'required|digits_between:10,15|unique:users,phone,' . $admin->id,
                'password' => 'nullable|min:8|confirmed',
            ]);

            $admin->update([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'name' => trim($validated['first_name'] . ' ' . $validated['last_name']),
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'password' => !empty($validated['password']) ? bcrypt($validated['password']) : $admin->password,
            ]);

            return redirect()->route('backend.admin.all_admins')->with('success', 'Admin updated successfully.');
        } catch (\Exception $e) {
            Log::error($e);
            abort('500');
        }
    }


}