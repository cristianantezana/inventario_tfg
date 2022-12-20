<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class RolController extends Controller
{
  public function __construct()
  {
    $this->middleware(['permission:Rolindex'])->only('index');
    $this->middleware(['permission:Rolupdate'])->only('update');
    $this->middleware(['permission:Rolcreate'])->only('create');
    $this->middleware(['permission:Roldestroy'])->only('destroy');
    $this->middleware(['permission:Roledit'])->only('edit');
  }
  public function index()
  {
    $permiso = Permission::all()->pluck('name','id');
    $roles = Role::orderBy('id','desc')->get();
    return view('roles.index', compact('roles','permiso'));
  }

  public function create()
  {
    $permissions = Permission::all()->pluck('name', 'id');
        // dd($permissions);
        return view('roles.create', compact('permissions'));
  }

  public function store(Request $request)
  {
    $rol = $request->input('rol');
    $roles = Role::create(['name' => $rol]);
    $roles->permissions()->sync($request->input('permissions', []));
    return redirect()->route('roles.index')->with('mensaje', 'ok');
  
  }

  public function show($id)
  {
      
  }
  public function edit(Role $role)
  {
      //abort_if(Gate::denies('role_edit'), 403);
      $permiso = Permission::all()->pluck('name','id');
     // $roles = Role::orderBy('id','desc')->get();
      $permissions = Permission::all()->pluck('name', 'id');
      $role->load('permissions');
      // dd($role);
      return view('roles.edit', compact('role', 'permissions','permiso'));
  }

  // public function edit(Role $role)
  // {
  //   $permiso = Permission::all()->pluck('name','id');
  //   $role->load('permissions');
  //   dd($role);
  //   return view('roles.edit' , compact('role','permiso'));
  // }

  public function update(Request $request, Role $role)
    {
        $role->update($request->only('name'));

        // $role->permissions()->sync($request->input('permissions', []));
        $role->syncPermissions($request->input('permissions', []));

        return redirect()->route('roles.index')->with('mensaje', 'ok');
    }

  public function destroy($id)
  {
    $persona = Role::find($id);
    $persona->delete();
    return "ok";  
  }
}
