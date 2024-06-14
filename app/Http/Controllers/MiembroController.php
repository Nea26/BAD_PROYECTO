<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Miembro;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class MiembroController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:miembro.home.destroy')->only('destroy');
        $this->middleware('can:miembro.home.edit')->only('edit');
        $this->middleware('can:miembro.home.update')->only('update');
        $this->middleware('can:miembro.home.buscar')->only('buscar');
        $this->middleware('can:miembro.home.show')->only('verMiembros');
        
    }
    //
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('home')->with('success', 'Eliminacion exitosa');
    }
    public function search(Request $request)
    {
        $query = $request->get('query');
        $miembros = Miembro::where('nombre', 'like', "%{$query}%")
            ->orWhere('apellido', 'like', "%{$query}%")
            ->get();

        return response()->json($miembros);
    }
    public function show(string $id)
    {
        
    }
    public function edit($user_id)
    {
        $miembro = Miembro::where('user_id', $user_id)->first();
        $user= User::find($miembro->user_id);
        return view('/editarUsuarios/editarMiembro', ['miembro' => $miembro, 'user' => $user]);
    }
    public function update(Request $request, $user_id)
    {
        $miembro = Miembro::where('user_id', $user_id)->first();
        $user = User::find($miembro->user_id);
        // Actualiza los campos del usuario
        $userData = $request->only('nombre', 'apellido', 'name', 'password', 'email');

        // Si se proporcionó una nueva contraseña, hashea la contraseña antes de actualizar el usuario
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        // Actualiza los campos del miembro
        $miembroData = [
            'NOMBRE' => $userData['nombre'],
            'APELLIDO' => $userData['apellido'],
            'DOC_IDENTIFICACION' => $request->tipo_identificacion,
            'NUM_DOC_IDENTIFICACION' => $request->num_identificacion,
            'TELEFONO' => $request->telefono,
            'FECHA_NACIMIENTO' => $request->fecha_nac,
        ];

        $miembro->update($miembroData);

        return redirect()->route('home')->with('success', 'Actualizacion exitosa');
    }
    public function verMiembros(){
        
        Paginator::useBootstrap();
        // listado de Miembros
        $miembros = DB::table('miembro')
            ->join('users', 'miembro.user_id', '=', 'users.id')
            ->select('miembro.*', 'users.activo')->paginate(5);
        return view('administrarMiembros', [
            'miembros' => $miembros,
        ]);
    }
    public function buscar(Request $request){
        Paginator::useBootstrap();
        $miembros = DB::table('miembro')
        ->join('users', 'miembro.user_id', '=', 'users.id')
        ->where('miembro.NOMBRE', 'like', '%' . $request->buscar_Miembro . '%')
        ->orWhere('miembro.APELLIDO', 'like', '%' . $request->buscar_Miembro . '%')
        ->orWhere('miembro.CARNET_Miembro', 'like', '%' . $request->buscar_Miembro . '%')
        ->orderBy('miembro.NOMBRE', 'asc')
        ->paginate(5);
        if ($miembros->isEmpty()) {
            return response()->json(['status' => 'error', 'message' => 'No se encontraron resultados']);
        } else {
            return view('administrarMiembros', compact('miembros'));
        }
        }
        //Paginacion de miembros
        public function pagination(){
            Paginator::useBootstrap();
            $miembros = DB::table('miembro')
                ->join('users', 'miembro.user_id', '=', 'users.id')
                ->select('miembro.*', 'users.activo')->paginate(5);
                return view('paginacion/paginacionMiembros', compact('miembros'));
        }
}
