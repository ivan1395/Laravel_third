<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tarea;
class TareaController extends Controller
{
 public function create(Request $request)
 {
 if (Auth::check()) {
 $this->validate($request, [
 'nombre' => 'required',
 ]);
 Tarea::create($request->all());
 }
 return to_route('tareas');
 }
 public function delete($id)
 {
 if (Auth::check()) {
 $tarea = Tarea::find($id);
 $tarea->delete();
 }
 return to_route('tareas');
 }
}

