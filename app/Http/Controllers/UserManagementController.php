<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    // Menampilkan daftar user
    public function index()
    {
        $users = User::with(['roles'])->get();
        $roles = Role::all();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Get the currently authenticated user
        $currentUser = Auth::user();

        // Prevent the current admin from changing their own role to "user"
        if ($currentUser->id === $user->id) {
            return redirect()->back()->withErrors(['error' => 'You cannot delete yourself.']);
        }

        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }
}
