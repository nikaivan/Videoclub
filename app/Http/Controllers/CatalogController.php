<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Notification;

class CatalogController extends Controller
{

    //
    public function getIndex(){
        /*Notification::success('Success message');
        Notification::error('Error message');
        Notification::info('Info message');
        Notification::warning('Warning message');*/
        $peliculas = Movie::all();
        return view('catalog.index')->with('peliculas',$peliculas);
    }

    public function getShow($id){
        $peliculas = Movie::findOrFail($id);
        return view('catalog.show')->with('peliculas',$peliculas);
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function getEdit($id){
        $peliculas = Movie::findOrFail($id);
        return view('catalog.edit')->with('peliculas',$peliculas);

    }

    public function postCreate(Request $request){
        $peliculas = new Movie;

        $peliculas->title = $request->input('title');
        $peliculas->year = $request->input('year');
        $peliculas->director = $request->input('director');
        $peliculas->poster = $request->input('poster');
        $peliculas->synopsis = $request->input('synopsis');
        $peliculas->save();
        Notification::success('La película '.$peliculas->title.' se ha guardado correctamente');
        return redirect()->action('CatalogController@getIndex');

     }

     public function putEdit(Request $request, $id){
        $peliculas = Movie::findOrFail($id);

        $peliculas->title = $request->input('title');
        $peliculas->year = $request->input('year');
        $peliculas->director = $request->input('director');
        $peliculas->poster = $request->input('poster');
        $peliculas->synopsis = $request->input('synopsis');
        $peliculas->save();
        Notification::success('La película '.$peliculas->title.' se ha modificado correctamente');
        return redirect()->action('CatalogController@getShow',[$peliculas->id]);

     }

    public function putRent(Request $request, $id){
        $peliculas = Movie::findOrFail($id);
        $peliculas->rented = 1;
        $peliculas->save();
        Notification::success('La película '.$peliculas->title.' se ha alquilado correctamente');
        return redirect()->action('CatalogController@getShow',[$peliculas->id]);
        //return view('catalog.show')->with('peliculas', $peliculas);
    }

    public function putReturn(Request $request, $id){
        $peliculas = Movie::findOrFail($id);
        $peliculas->rented = 0;
        $peliculas->save();
        Notification::success('La película '.$peliculas->title.' se ha devuelto correctamente');
        return redirect()->action('CatalogController@getShow',[$peliculas->id]);
        //return view('catalog.show')->with('peliculas', $peliculas);
    }

    public function deleteMovie(Request $request, $id){
        $peliculas = Movie::findOrFail($id);
        $peliculas->delete();
        Notification::success('La película '.$peliculas->title.' se ha borrado correctamente');
        return redirect()->action('CatalogController@getIndex');

    }
}
