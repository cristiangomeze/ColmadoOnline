<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserResquest;
use App\User;
use App\Customers;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.user.users');
    }

    public function personal()
    {
        $users=User::whereIn('rol_id', [2, 3, 4])->get();

        return view('admin.pages.user.personal',compact('users'));

    }


    public function cliente()
    {
        $users=User::whereIn('rol_id', [1])->get();

        return view('admin.pages.user.clientes',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserResquest $request)
    {

        $user = new User;

        $user->name= $request->nombre;
        $user->last_name=$request->apellido;
        $user->sex = $request->sexo;
        $user->email= $request->correo;
        $user->password = bcrypt($request->contrasena);
        $user->phone =$request->celular;
        $user->status = 'A';
        $user->rol_id = $request->rol;

        $user->save();
       
         
        if($request->rol=='1')
        {
            $cliente = new Customers;

            $cliente->user_id = $user->id;

            $cliente->save();


        }


        return redirect()->route('user')->with('status', 'Usuario Registrado Correctamente!');
         

        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    
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
    public function editStatus($id, $status)
    {
        $user = User::find($id);

        $mensaje="";

        if($status=='A')
        {
            $user->status='I';

            $mensaje = "Usuario Desactivado Correctamente";

                 
        }else
        {
            $user->status='A';

            $mensaje = "Usuario Activado Correctamente";

        }

        $user->save();

        return redirect()->route('personal')->with('status', $mensaje);
        
    }


    public function editStatusCliente($id, $status)
    {
        $user = User::find($id);

        $mensaje="";

        if($status=='A')
        {
            $user->status='I';

            $mensaje = "Usuario Desactivado Correctamente";

                 
        }else
        {
            $user->status='A';

            $mensaje = "Usuario Activado Correctamente";

        }

        $user->save();

        return redirect()->route('cliente')->with('status', $mensaje);
        
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
    }
}
