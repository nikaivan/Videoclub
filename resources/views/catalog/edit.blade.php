@extends('layouts.master')

@section('content')
   <div class="row" style="margin-top:20px">

	<div class="col-md-offset-3 col-md-6">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title text-center">
					<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
					Editar pelicula
				</h3>
			</div>

			<div class="panel-body" style="padding:30px">
			    <form action="" method="post">
					{{csrf_field()}}
                    {{method_field('PUT')}}
    				<div class="form-group">
    					<label for="title">Título</label>
    					<input type="text" name="title" id="title" class="form-control" value="{{$peliculas->title}}">
					</div>

					<div class="form-group">
						<label for="year">Año</label>
    					<input type="text" name="year" id="year" class="form-control" value="{{$peliculas->year}}">
					</div>

					<div class="form-group">
						<label for="director">Director</label>
    					<input type="text" name="director" id="director" class="form-control" value="{{$peliculas->director}}">
					</div>

					<div class="form-group">
						<label for="poster">Poster</label>
    					<input type="text" name="poster" id="poster" class="form-control" value="{{$peliculas->poster}}">
					</div>

					<div class="form-group">
						<label for="synopsis">Resumen</label>
    					<textarea name="synopsis" id="synopsis" class="form-control" rows="3">
                            {{$peliculas->synopsis}}
                        </textarea>
					</div>

					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
							Modificar película
						</button>
					</div>
                </form>
			</div>
		</div>
	</div>
</div>
@stop
