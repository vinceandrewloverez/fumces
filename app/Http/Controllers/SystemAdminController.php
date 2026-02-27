<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SystemAdminController extends Controller
{
    // Dashboard
    public function index()
    {
        return view('system-admin.index');
    }

    // Users Management: List all users
    public function users()
    {
        $users = User::all();
    
        // Stats
        $stats = [
            'total' => $users->count(),
            'Admin' => $users->where('role', 'Admin')->count(),
            'Student' => $users->where('role', 'Student')->count(),
            'Registrar' => $users->where('role', 'Registrar')->count(),
            'Cashier' => $users->where('role', 'Cashier')->count(),
            'Admissions' => $users->where('role', 'Admissions')->count(),
            'System Admin' => $users->where('role', 'System Admin')->count(),
        ];
    
        return view('system-admin.users', compact('users', 'stats'));
    }
    // Update user (PATCH)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string|in:Admin,Student,Registrar,Cashier,Admissions,System Admin,Teacher',
            'status' => 'required|string|in:Active,Inactive',
        ]);
    
        $user = User::findOrFail($id);
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status, // ← THIS WAS MISSING
        ]);
    
        return redirect()->route('system-admin.users.index')
                         ->with('success', 'User updated successfully.');
    }
    // Show create user page (if needed)
    public function create()
    {
        return view('system-admin.users.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'role' => 'required|string|in:Admin,Student,Registrar,Cashier,Admissions,System Admin',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => bcrypt($request->password ?? '12345678'), // default if empty    ]);
    ]);
    return redirect()->route('system-admin.users.index')
                     ->with('success', 'User added successfully.');
}

    // Optional: delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('system-admin.users.index')
                         ->with('success', 'User deleted successfully.');
    }
}