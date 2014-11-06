<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Zizaco\Entrust\HasRole;
class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	use HasRole;
	
	public function setPasswordAttribute($password){
		$this->attributes['password'] = \Hash::make($password);
	}
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $fillable = array('name','username','id_departamento', 'id_puesto', 'password');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	
	public $errors;
	/*el método isValid, que acepta como parámetro la data enviada
	por el usuario. Dentro fíjense que defino un array con las 
	reglas de validación “rules”.*/
	public function isValid($data){
		 
		$rules= array(
			'name'				=>	'required|min:4|max:50',
			'username'			=>	'required',
			'password'			=>	'required|min:5',
			'id_departamento'	=>	'required',
			'id_puesto'			=>	'required'
			
		);
		
		$validator	=	Validator::make($data, $rules);
		
		//devuelve TRUE si la validación pasa
		if($validator->passes()){
		
			return true;
		}
		/*si falla entonces almacenamos en la propiedad $errors 
		los errores para decirle al usuario qué salió mal:*/
		$this->errors= $validator->errors();
		
		return false;
	}
	
	 public function depto(){
        return $this->hasOne('Depto','id');
    }
}
