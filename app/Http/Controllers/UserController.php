<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
        ]);

        $user = User::find($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Role pengguna berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Pengguna dihapus.');
    }
}
