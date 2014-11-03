<?php

class Depto extends Eloquent{

	//Relacion <uno a muchos> un Depto puede tener muchos usuarios
	public function users(){ 
        return $this->hasMany('User','id_departamento'); 
    }


}