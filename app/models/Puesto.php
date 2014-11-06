<?php

class Puesto extends Eloquent{

	//Relacion <uno a muchos> un Puesto puede tener muchos usuarios
	public function users(){ 
        return $this->hasMany('User','id_puesto'); 
    }


}