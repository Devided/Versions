<?php

class Application extends \Eloquent {
	protected $fillable = ['name,url'];

    public function plugins()
    {
        return $this->belongsToMany('Plugin');
    }
}