<?php

class Plugin extends \Eloquent {

	protected $fillable = ['name', 'thread'];

    public function applications()
    {
        return $this->belongsToMany('Applications');
    }

    public function versions()
    {
        return $this->hasMany('Version');
    }

    public function thread()
    {
        $version = $this->current_version();

        if($version)
        {

            switch($version->risk)
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

        } else {
            return 'Unknown';
        }

    }

    public function version_name()
    {
        $version = $this->current_version();

        if($version)
        {
            return $version->name;
        } else {
            return 'Unknown';
        }
    }

    private function current_version()
    {
        return $this->versions()->orderBy('id', 'desc')->first();
    }

}