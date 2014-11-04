<?php

class UserController extends BaseController {

	public function showLogin(){
        // Verificamos que el usuario no esté autenticado
        if (Auth::check()){
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return Redirect::to('inicio');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return View::make('login');
    }
	
	public function postLogin(){
	
		/*$data=Input::all();
		
		$reglas= array(
			'username'	=>	'required|alpha_num|min:3|max:32',	//array('alpha_num', 'min:3')
			
			'password'	=>	array('required', 'min:3')
			
		);
		$validador=Validator::make($data,$reglas);
		if($validador->passes()){
			return 'Datos guardados.';
			//Redirect::to('inicio');
		}
		
		//$error = $validador->messages();
		return Redirect::to('login')->withErrors($validador);*/
		
		$userdata = array(
            'username' => mb_strtolower(Input::get('username')),
            'password'=> Input::get('password')
        );
        // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
        if(Auth::attempt($userdata, Input::get('rememberme', 0)))
        {
            // De ser datos válidos nos mandara a la bienvenida
            return Redirect::to('inicio');
        }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect::to('login')
                    ->with('mensaje_error', 'Tus datos son incorrectos')
                    ->withInput();
		
	}

	/* Muestra el formulario de login mostrando un mensaje de que cerró sesión.
     */
    public function logOut(){
        Session::flush();
        //return 'session cerrada';
		
		return Redirect::to('login')
                    ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }

	
	public function showCreateUser(){
		
		return View::make('createUser');
	}
	
	public function postCreateUser(){
		
		
		
		$user = new User;
		
		$data=Input::all();
		
		if($user->isValid($data)){
		
			$user->fill($data);
			
			$user->save();
			
			return Redirect::to('nombre_all');
		
		}else{
			return Redirect::to('create')->withInput()->withErrors($user->errors);
		}
		
	}
}