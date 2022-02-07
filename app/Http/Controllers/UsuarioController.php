<?php

namespace App\Http\Controllers;

use App\Models\Usuario as Usuario;
use App\Http\Resources\Usuario as UsuarioResource;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate(15);
        return UsuarioResource::collection($usuarios);
    }

   
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario;
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->status = $request->input('status');

        if( $usuario->save() ){
            return new UsuarioResource( $usuario );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail( $id );
        return new UsuarioResource( $usuario );
    }

   
    
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail( $request->id );
       
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->status = $request->input('status');
    
        if( $usuario->save() ){
          return new UsuarioResource( $usuario );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail( $id );
        if( $usuario->delete() ){
          return new UsuarioResource( $usuario );
        }
    }
}
