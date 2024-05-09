<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * En lugar de recuperar todas las columnas de una tabla,
         * selecciona solo las columnas necesarias en tus consultas de Eloquent
         * utilizando el método select().
         * Esto reduce el tamaño de los conjuntos de resultados y mejora el rendimiento.
         * Adicionalmente, se definen las relaciones en los modelos de country y user para poder
         * instanciarlos de manera correcta
         * Realizamos un proceso de cache, no alto ya que en caso de 1000 clientes, se entiende que la actualizacion requiere
         * ser publicada en la api lo mas pronto posible
         * Usamos el método with('country:id,name') para cargar la relación country mientras
         * seleccionamos solo las columnas id y name de la tabla countries.
         * Esto optimiza la consulta al traer solo la información necesaria de los países.
         * Luego, mapeamos la colección de usuarios para
         * incluir el nombre del país en cada usuario y
         * eliminamos la relación country para evitar problemas de serialización.
         */


        $users = Cache::remember('users', 1, function () {
            return User::with('country:id,name')->select('id', 'name', 'email', 'country_id')->get();
        });

        $users = $users->map(function ($user) {
            $user->country_name = $user->country->name;
            unset ($user->country, $user->country_id);
            return $user;
        });

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
