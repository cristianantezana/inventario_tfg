<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Persona;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
  public function __construct()
  {
    $this->middleware(['permission:Usuarioindex'])->only('index');
    $this->middleware(['permission:Usuarioupdate'])->only('update');
    $this->middleware(['permission:Usuariocreate'])->only('create');
    $this->middleware(['permission:Usuariodestroy'])->only('destroy');
    $this->middleware(['permission:Usuarioedit'])->only('edit');
  }

  public function login(Request $request){
      $this->validate(request(),[
          'email' => 'email|required|string',
          'password' => 'required|string',
      ]);
      return dd($request->all());
  }

  public function index()
  {
    $usuarios = User::where('estado', '=', 1)->take(10)->orderBy('id', 'desc')->get();
    $roles = Role::orderBy('id','desc')->get();
    
    return view('usuarios.index', compact('usuarios', 'roles'));
  }

  public function create()
  {
    
    $roles = Role::all()->pluck('name', 'id');
    return view('usuarios.create',compact('roles'));
  }

  public function store(Request $request)
  {
    $request->validate([
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);
   

    $user = User::create([
        'cod_persona_users' => $request->id,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    $roles = $request->input('roles', []);
        $user->syncRoles($roles);
   
    event(new Registered($user));
    return redirect()->route('usuarios.index')->with('mensaje', 'ok');
  }
  public function personaRegistrada($id)
  {
    $persona = Persona::find($id);
    return redirect()->route('usuarios.create')->with('persona', $persona, );
  }
  public function show($id)
  {
    
  }

  public function edit($id)
  {
     $roles = Role::all()->pluck('name', 'id');
       // $user->load('roles');
    $usuario = User::find($id);
    return view('usuarios.edit', compact('usuario', 'roles'));
    
  }

  public function updateUsuario(Request $request, $id)
  {
    $user = User::find($id);
    $cod_persona = $request->cod_persona;
    $persona = Persona::find($cod_persona);
    $data_persona = ['nombre' => $request->nombre,'apellido' => $request->apellido,'celular' => $request->celular,'direccion' => $request->direccion];
    $persona->update($data_persona);
    $roles = $request->input('roles', []);
        $user->syncRoles($roles);

    return redirect()->route('usuarios.index')->with('mensaje', 'ok');
    
  }
  public function update(Request $request, $id)
  {
    $cod_persona = $request->cod_persona;
    $persona = Persona::find($cod_persona);
    $data_persona = ['nombre' => $request->nombre,'apellido' => $request->apellido,'celular' => $request->celular,'direccion' => $request->direccion];
    $persona->update($data_persona);
    $usuario = User::find($cod_persona);
    $data = ['email' => $request->email];
    $usuario->update($data);
    $mensaje = 'ok';
    return view('bienvenida',compact('mensaje'));  
  }

  public function destroy($id)
  {
    $cliente = User::find($id);
    $cliente-> estado = 0;
    $cliente->save();
    return "ok"; 
    
  }
  public function restaurar($id)
  {
    $contrasena = "123456789*";
    $usuario = User::find($id);;
    $data = [ 'password' => Hash::make($contrasena)];
    $usuario->update($data);
    $usuario->save();
    return "ok"; 
    
  }
}
