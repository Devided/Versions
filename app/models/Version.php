<?php

class Version extends \Eloquent {
	protected $fillable = ['name','plugin_id','css','js'];

    public function plugin()
    {
        return $this->belongsTo('Plugin');
    }

    public function thread()
    {
        switch($this->risk)
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