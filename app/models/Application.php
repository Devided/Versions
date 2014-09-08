<?php

class Application extends \Eloquent {
	protected $fillable = ['name,url'];

    public function versions()
    {
        return $this->belongsToMany('Version');
    }
}