
<h1>Formulario de resgistro para los parques de Phil.</h1>
{{ Form::open(array('url' => '/registro', 'files'=>true)) }}

	

	{{-- Campo de usuario. --------------------}}
	<span class="error">{{ $errors->first('usuario')}}
	</span>
	
	{{ Form::label('usuario','Usuario') }}
	{{ Form::text('usuario')}}

	
	{{-- Campo de contraseña. --------------------}}
	<span class="error">{{ $errors->first('password')}}
	</span>
	{{ Form::label('password','Contraseña') }}
	{{ Form::password('password') }}
	
	{{-- Campo de confirmacion de contraseña. --------------------}}
	{{ Form::label('password_confirmation','Confirmación de contraseña') }}
	{{ Form::password('password_confirmation')}}
	
	{{ Form::submit('Resgistrar') }}
	
	{{ Form::reset('Limpiar') }}

{{ Form::close() }}