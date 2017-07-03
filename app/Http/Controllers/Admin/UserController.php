<?php

namespace App\Http\Controllers\Admin; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class UserController extends Controller 
{
    public function __construct()
    {
        //$this->middleware('role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = User::buscar($request->search)->orderBy('id', 'DESC')->paginate(10);

        return view('admin.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    
    public function create()
    {
        $roles = Role::orderBy('id', 'desc')->pluck('role', 'id');
        //dd($roles);
        return view('admin.user.create', compact('roles'));
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
       $this->validate($request, [
           'name' => 'required|max:100',
            'user' => 'required|max:25|unique:users',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
            'role_id' => 'required'
        ]);
        
        $user = User::create([
            'name' => $request->get('name'),
            'user' => $request->get('user'),
            'email' => $request->get('email'),
            'password' => bcrypt($request['password']),
            'role_id' => $request->get('role_id')
        ]);

        //Session::flash('flash_ message', 'Usuario Agregado Correctamente!');

        return redirect('admin/usuario')->with('message', 'Usuario Agregado Correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
       //dd($id);

        $users = User::findOrFail($id);

         return view('admin.user.details', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
     public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $users = User::findOrFail($id);
        $users->update($requestData);

        //Session::flash('flash_message', 'User updated!');

       return redirect('admin/usuario')->with('message', 'Usuario Editado Correctamente!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
  {
        $user = User::find($id);
        $user->delete();

        //Session::flash('flash_message', 'Usuario Eliminado!');

         return redirect('admin/usuario')->with('message', 'Usuario Eliminado Correctamente!');
    }
}
