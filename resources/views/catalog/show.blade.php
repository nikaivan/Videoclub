@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-4">
        <img src="{{$peliculas->poster}}" style="height:400px"/>
    </div>
    <div class="col-sm-8">
        <h1>{{$peliculas->title}}</h1>
        <h4>Año:</h4><p>{{$peliculas->year}}</p>
        <h4>Director:</h4><p>{{$peliculas->director}}</p>
        <h4>Resumen:</h4><p>{{$peliculas->synopsis}}</p>
        @if($peliculas->rented === 1)
            <form action="{{action('CatalogController@putReturn', $peliculas->id)}}" method="POST" style="display:inline">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary" style="display:inline">Devolver película</button>
            </form>
        @else
             <form action="{{action('CatalogController@putRent', $peliculas->id)}}" method="POST" style="display:inline">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success" style="display:inline">Alquilar película</button>
            </form>
        @endif
            <a class="btn btn-warning" type="button" href="{{url('/catalog/edit/'.$peliculas->id)}}"><span class="glyphicon glyphicon-pencil"></span> Editar pelicula</a>
            <form action="{{action('CatalogController@deleteMovie', $peliculas->id)}}" method="POST" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" style="display:inline"><span class="glyphicon glyphicon-remove"></span>Borrar película</button>
            </form>
            <a class="btn btn" type="button" href="{{url('/')}}"><span class="glyphicon glyphicon-chevron-left"></span> Volver al listado</a>
    </div>
</div>
@stop