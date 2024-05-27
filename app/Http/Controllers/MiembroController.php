<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Miembro;

class MiembroController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:miembro.home.destroy')->only('destroy');
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
    
}
