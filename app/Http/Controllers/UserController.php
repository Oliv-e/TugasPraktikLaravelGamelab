<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|unique:users|max:255',
            'password'=> 'required|max:255',
        ]);
        $user = User::create($validated_data);

        return redirect()->route('users.create')
        ->with('success','User Created Successfully');
    }
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
    public function update(Request $request, string $id)
    {
        $validated_data = $request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|unique:users|max:255',
            'password'=> 'required|max:255',
        ]);
        $user = User::whereId($id)->update($validated_data);

        return redirect()->route('users.edit', $id)
        ->with('success','User Created Successfully');
    }
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')
        ->with('success','User Deleted Successfully');
    }
}
