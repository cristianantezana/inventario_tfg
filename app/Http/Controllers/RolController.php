<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class RolController extends Controller
{
  public function index()
  {
    $roles = Role::all();
    return view('roles.index', compact('roles'));
  }

  public function create()
  {
  
  }

  public function store(Request $request)
  {
    $rol = $request->input('rol');
    Role::create(['name' => $rol]);
    return redirect()->back()->with('mensaje', 'ok');
  }

  public function show($id)
  {
      
  }

  public function edit($id)
  {
  
  }

  public function update(Request $request, $id)
  {
    $rol = Role::find($id);
    $data = ['name' => $request->rol];
    $rol->update($data);
    
    return redirect()->route('roles.index')->with('mensaje', 'ok');
  }

  public function destroy($id)
  {
    $persona = Role::find($id);
    $persona->delete();
    return "ok";  
  }
}
