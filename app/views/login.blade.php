<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Inciar Sesion Reporteador</title>
		{{ HTML::style('bootstrap-3.2.0-dist/css/bootstrap.min.css'); }}
    </head>
<body>

	
	 <div class="container">
            <!--<div class="panel panel-default">-->
                <div class="form-signin" >
                    {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
                    @if(Session::has('mensaje_error'))
                        <div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
                    @endif
                    {{ Form::open(array('url' => '/')) }}
                        <h2 class="form-signin-heading">Iniciar sesión</h2>
                        
                            <!--{{ Form::label('usuario', 'Nombre de usuario') }}-->
							<span class="error">{{ $errors->first('username')}}
							</span>
	
                            {{ Form::text('username', Input::old('username'), array('class' => 'form-control','placeholder'=>'Usuario')); }}
                        
                            <!--{{ Form::label('contraseña', 'Contraseña') }}-->
							<span class="error">{{ $errors->first('password')}}
							</span>
                            {{ Form::password('password', array('class' => 'form-control','placeholder'=>'Contraseña')); }}
							<div>
								<label>
									Recordar contraseña
									{{ Form::checkbox('rememberme', true) }}
								</label>
							</div>
							
                        {{ Form::submit('Enviar', array('class' => 'btn btn-lg btn-primary btn-block')) }}
                    {{ Form::close() }}
                </div>
            <!-- </div>-->
        </div>
		
		
		
		
        {{ Form::close() }}
		
	
	
	
	@include('pie')
</body>
</html>