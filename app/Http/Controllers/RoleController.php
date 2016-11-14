<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\Permission;
use Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$this->authorize('index', new Role);
        $roles = Role::orderBy('id', 'asc')->get(); 
        return view('roles.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $this->authorize('create', new Role);
        // $list = Permission::lists('title', 'id');
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$this->authorize('create', new Role);
        $this->validate($request, array(
            'name' => 'required|min:3|max:255',
            'description' => 'required'
            
            ));
        
        $role = new Role;

        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        Session::Flash('Success', 'New Role has been added');
        return redirect()->route('roles.index');


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
    public function edit($id)
    {
        //

        $role = Role::find($id);
        return view('roles.edit')->withRole($role);
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
        $this->validate($request, array(
            'name' => 'required|min:3|max:255',
            'description' => 'required'
            
            ));
        
        $role = new Role;

        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        //Session::Flash('Success', 'Role has been updated.');
        return redirect()->route('roles.index');

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
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index');

    }
}
