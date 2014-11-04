<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//Pagina de inicio de la pagina --Todos pueden acceder.
Route::get('/', function(){
	return View::make('index');
});

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function(){
    // Esta será nuestra ruta de bienvenida.
    Route::get('inicio', function()
    {
        return View::make('hello');
    });
    // Esta ruta nos servirá para cerrar sesión.
   Route::get('logout', 'UserController@logOut');
});



// Nos mostrará el formulario de creacion de usurios.
Route::get('create','UserController@showCreateUser');

// Validamos los datos que se guardaran.
Route::post('create','UserController@postCreateUser');

Route::get('login', 'UserController@showLogin');

Route::post('login', 'UserController@postLogin');


/*Route::post('login', function(){
	$data=Input::all();
	
	$reglas= array(
		'username'	=>	'required|alpha_num|min:3|max:32',	//array('alpha_num', 'min:3')
		
		'password'	=>	array('required', 'min:3')
		
	);
	$validador=Validator::make($data,$reglas);
	if($validador->passes()){
		return 'Datos guardados.';
	}
	
	//$error = $validador->messages();
	return Redirect::to('login')->withErrors($validador);
});*/

Route::get('nombre', function(){
	$depto= Depto::find(2);
	return $depto->departamento;
});

Route::get('agregar', function(){
	/*$user=new User;
	$user->name= 'Francisco Mendez Perez';
	$user->username=mb_strtolower('FRANCISCO.MENDEZ');
	$user->id_departamento='1';
	$user->id_puesto='1';
	$user->password='juiklop';
	$user->save();
	
	$user=new User;
	$user->name= 'Antonio Soriano Pineda';
	$user->username=mb_strtolower('Antonio.Soriano');
	$user->id_departamento='2';
	$user->id_puesto='21';
	$user->password='juiklop';
	$user->save();
	
	$depto= new Depto;
	$depto->departamento='Gerencia';
	$depto->save();
	
	$depto= new Depto;
	$depto->departamento='Sistemas';
	$depto->save();*/
	
	$user=new User;
	$user->name= 'Alejandra Ramos Perez';
	$user->username=mb_strtolower('alejandra.ramos');
	$user->id_departamento='1';
	$user->id_puesto='2';
	$user->password='juiklop';
	$user->save();
	
});

Route::get('nombre_all', function(){

	$users= User::all();
	//var_dump($users);
	foreach ($users as $user){
		echo $user->name;
		echo '</br>';
		echo $user->depto->departamento;
		echo '</br>';
	}
	
	/*
	$depto= Depto::find(1);
	echo $depto->departamento;
	echo '<br/>';
	foreach($depto->users as $user){
		echo '<br/>';
		echo $user->name;
		echo '<br/>';
		echo $user->username;
    }
	echo "<br/";
	*/
});

//obtiene los nombre de todos del departamento seleccionado
Route::get('/{id}', function($id){
	
	$depto= Depto::find($id);
	echo $depto->departamento;
	echo '<br/>';
	foreach($depto->users as $user){
		echo '<br/>';
		echo $user->name;
		echo '<br/>';
		echo $user->username;
    }
	echo "<br/";
});