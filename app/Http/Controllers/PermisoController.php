<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class PermisoController extends Controller
{
    use HasRoles;
    public function index()
    {
        $permisos = Permission::all();
        return view('permisos.index', compact('permisos'));
    }

    public function store(Request $request)
  {
  
    $permiso = $request->input('permiso');
    Permission::create(['name' => $permiso]);
    return redirect()->back()->with('mensaje', 'ok');
  }

  public function update(Request $request, $id)
  {
    $categoria = Permission::find($id);
    $data = ['name' => $request->permiso];
    $categoria->update($data);
    
    return redirect()->route('permisos.index')->with('mensaje', 'ok');
  }
  public function destroy($id)
  {
    $persona = Permission::find($id);
    
    $persona->delete();
    return "ok";  
  }
}
