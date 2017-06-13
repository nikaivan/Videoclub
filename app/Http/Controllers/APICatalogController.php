<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class APICatalogController extends Controller
{

    public function index()
    {
        return response()->json(Movie::all());
    }


    public function store(Request $request)
    {
        $peliculas = new Movie;
        $peliculas->title = $request->input('title');
        $peliculas->year = $request->input('year');
        $peliculas->director = $request->input('director');
        $peliculas->poster = $request->input('poster');
        $peliculas->synopsis = $request->input('synopsis');
        $peliculas->save();
        return response()->json(['error' => false, 'msg'=>'La pelicula se ha guardado correctamente']);
    }

    public function show($id)
    {
        return response()->json(Movie::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
        $peliculas = Movie::findOrFail($id);

        $peliculas->title = $request->input('title');
        $peliculas->year = $request->input('year');
        $peliculas->director = $request->input('director');
        $peliculas->poster = $request->input('poster');
        $peliculas->synopsis = $request->input('synopsis');

        $peliculas->save();
        return response()->json(['error'=>false, 'msg'=>'La pelicula se ha modificado como alquilada']);

    }

    public function destroy($id)
    {
        $peliculas = Movie::findOrFail($id);
        $peliculas->delete();
        return response()->json(['error'=>false, 'msg'=>'La pelicula  ha sido borrada']);
    }

    public function putRent(Request $request, $id)
    {
        $m = Movie::findOrFail($id);
        $m->rented = 1;
        $m->save();
        return response()->json(['error'=>false, 'msg'=>'La pelicula se ha marcado como alquilada']);
    }

    public function putReturn(Request $request, $id)
    {
        $m = Movie::findOrFail($id);
        $m->rented = 0;
        $m->save();
        return response()->json(['error'=>false, 'msg'=>'La pelicula se ha marcado como devuelta']);
    }
}
