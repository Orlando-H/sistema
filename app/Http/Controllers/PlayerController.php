<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['players']=Player::paginate(1);
        return view('player.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('player.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'quality' => 'required|integer',
            'potential' => 'required|integer',
            'value' => 'required|integer',
            'age' => 'required|integer',
            'position' => 'required|string|max:100',
            'team' => 'string|max:100',
            'image' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje=[
            'required' => 'El :attribute es requerido',
            'image.required' => 'La imagen es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosPlayer = request()->except('_token');

        if($request->hasFile('image')){
            $datosPlayer['image']=$request->file('image')->store('uploads','public');
        }

        Player::insert($datosPlayer);

        return redirect('player')->with('mensaje','Jugador agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player=Player::findOrFail($id);
        return view('player.edit',compact('player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $campos=[
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'quality' => 'required|integer',
            'potential' => 'required|integer',
            'value' => 'required|integer',
            'age' => 'required|integer',
            'position' => 'required|string|max:100',
            'team' => 'string|max:100',
            'image' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje=[
            'required' => 'El :attribute es requerido',
            'image.required' => 'La imagen es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosPlayer = request()->except(['_token','_method']);

        if($request->hasFile('image')){
            $player=Player::findOrFail($id);
            Storage::delete('public/'.$player->image);
            $datosPlayer['image']=$request->file('image')->store('uploads','public');
        }

        Player::where('id','=',$id)->update($datosPlayer);

        $player=Player::findOrFail($id);
        return redirect('player')->with('mensaje','Jugador modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $player=Player::findOrFail($id);

        if(Storage::delete('public/'.$player->image)){
            Player::destroy($id);
        }

        return redirect('player')->with('mensaje','Jugador eliminado con éxito');
    }
}
