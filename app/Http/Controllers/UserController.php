<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->cannot('isRole', 'App\Admin')) {
            abort(403);
        }
        $users = User::all();
        $usersCount = $users->count();
        return view('dashboard.usuarios.index', compact('usersCount', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('isRole', 'App\Admin')) {
            abort(403);
        }
        $users = User::all();
        $usersCount = $users->count();
        return view('dashboard.usuarios.create', compact('usersCount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('isRole', 'App\Admin')) {
            abort(403);
        }
        $credentials = $request->only('email', 'password', 'name');
        $credentials['password'] = Hash::make($credentials['password']);

        $user = User::create($credentials);
        $user->loggable_type = 'App\Admin';
        $user->save();

        //return dd($request->all());
        //return dd($user);
        return redirect('usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->user()->cannot('isRole', 'App\Admin')) {
            abort(403);
        }

        $users = User::all();
        $usersCount = $users->count();
        $user = User::find($id);
        return view('dashboard.usuarios.show', compact('usersCount', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
