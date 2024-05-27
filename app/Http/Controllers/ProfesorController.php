<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Profesor;

class ProfesorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:profesor.home.destroy')->only('destroy');
    }
    //
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('home')->with('success', 'Eliminacion exitosa');
    }

}
