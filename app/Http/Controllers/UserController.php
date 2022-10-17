<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::filter(request(['search']))->latest()->paginate(10);

        return view('dashboard.user.create',[
            'title' => 'User',
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:15'
        ]);

        $validasi['password'] = bcrypt($validasi['password']);

        User::create($validasi);
        return back()->with('success', 'Berhasil Dibuat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $datas = User::latest()->paginate(10);
        return view('dashboard.user.edit', [
            'title' => 'Edit',
            'user' => $user,
            'datas' => $datas,
        ]);
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
        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:15'
        ]);

        $validasi['password'] = bcrypt($validasi['password']);

        User::where('id',$id)->update($validasi);


        return redirect('/dashboard/user')->with('success', 'Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}
