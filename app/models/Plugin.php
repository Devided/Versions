<?php

class Plugin extends \Eloquent
{
    protected $fillable = ['name', 'risk', 'docurl'];

    public function applications()
    {
        return $this->belongsToMany('Applications');
    }

    public function versions()
    {
        return $this->hasMany('Version');
    }
}
