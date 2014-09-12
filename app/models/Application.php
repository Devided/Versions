<?php

class Application extends \Eloquent {
	protected $fillable = ['name,url'];

    public function versions()
    {
        return $this->belongsToMany('Version');
    }

    public static function thread($thread)
    {
        switch($thread)
        {
            case 0:
                return "None";
                break;
            case 1:
                return "Low";
                break;
            case 2:
                return "Medium";
                break;
            case 3:
                return "High";
                break;
            default:
                return "Unknown";
        }
    }
}