<?php

class Version extends \Eloquent {
	protected $fillable = [];

    public function plugin()
    {
        return $this->belongsTo('Plugin');
    }
}