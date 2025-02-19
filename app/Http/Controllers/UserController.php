<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::sortable();
        if (request('keyword')) {
            $users->where('username', 'like', '%' . request('keyword') . '%')
                ->orWhere('email', 'like', '%'  . request('keyword') . '%')
                ->orWhere('phone', 'like', '%' . request('keyword') . '%');
        }
        return view('admin.user.index', ['users' => $users->paginate(5)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:25|alpha_num|unique:users,username',
            'email' => 'required|email:dns|unique:users,email',
            'phone' => 'required|numeric',
            'saldo' => 'required|numeric',
            'level' => 'required',
            'password' => 'required|confirmed|min:6',
            'status' => 'required'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return back()->with('success', 'New User has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            "message" => "Berhasil Show Data!",
            "type" => request('type'),
            "data" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
<<<<<<< HEAD
        // return response()->json([
        //     "message" => "Berhasil Show Data Edit!",
        //     "data" => $user
        // ]);
        return view("admin.user.edit");
=======
        return view('admin.user.edit', ['user' => $user]);
>>>>>>> d6f18e496e2c680a80ace80a7b2409cf043d6105
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        
        
        if($request->password){
            $validatedData = $request->validate([
                'email' => 'required|email:dns|unique:users,email,'. $user->id,
                'phone' => 'required|numeric',
                'saldo' => 'required|numeric',
                'level' => 'required',
                'password' => 'required|min:6',
                'status' => 'required'
            ]);
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else{
            $validatedData = $request->validate([
                'email' => 'required|email:dns|unique:users,email,'. $user->id,
                'phone' => 'required|numeric',
                'saldo' => 'required|numeric',
                'level' => 'required',
                'status' => 'required'
            ]);
        }
        
        

        $user->update($validatedData);
        return redirect('user')->with('success', 'User has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return back()->with('success', 'User has been deleted!');
    }
}
