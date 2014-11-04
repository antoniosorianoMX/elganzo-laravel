<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Crear Usuario</title>
		{{ HTML::style('bootstrap-3.2.0-dist/css/bootstrap.min.css'); }}
    </head>
<body>
<!--  -->
	@include('cabecera')

	<div class="container">
            <!--<div class="panel panel-default">-->
        <div class="form-signin" >
            {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
            @if(Session::has('mensaje_error'))
                <div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
            @endif
            {{ Form::open(array('url' => '/create')) }}
            <h2 class="form-signin-heading">Crear Usuario</h2>
                        
                <!--{{ Form::label('usuario', 'Nombre de usuario') }}-->
				<span class="error">{{ $errors->first('name')}}
				</span>	
                {{ Form::text('name', Input::old('name'), array('class' => 'form-control','placeholder'=>'nombre')); }}
                     
				<span class="error">{{ $errors->first('username')}}
				</span>	
                {{ Form::text('username', Input::old('username'), array('class' => 'form-control','placeholder'=>'usuario')); }}

				<!--  -->
				<span class="error">{{ $errors->first('id_departamento')}}
				</span>	
                <!--{{ Form::text('departamento', Input::old('departamento'), array('class' => 'form-control','placeholder'=>'departamento')); }}-->
				
				{{ Form::label('lbldepartamento', 'DEPARTAMENTO') }}
				{{ Form::select('id_departamento', array(
				'DEPARTAMENTO' => array(
				'2' => 'sistemas',
				'1' => 'gerencia')				
				), 2); }}
				</br>
				<!--  -->
				<span class="error">{{ $errors->first('id_puesto')}}
				</span>
				{{ Form::label('lblpuesto', 'PUESTO') }}
				{{ Form::select('id_puesto', array(
				'GERENCIA' => array(
				'1' => 'subgerencia',
				'2' => 'subsubgerencia')
				), 2); }}
				
                
				
                <!--{{ Form::label('contraseña', 'Contraseña') }}-->
				<span class="error">{{ $errors->first('password')}}
				</span>
                {{ Form::password('password', array('class' => 'form-control','placeholder'=>'Contraseña')); }}
						
                {{ Form::submit('crear', array('class' => 'btn btn-lg btn-primary btn-block')) }}
            {{ Form::close() }}
                </div>
            <!-- </div>-->
        </div>
	
	@include('pie')
</body>
</html>
