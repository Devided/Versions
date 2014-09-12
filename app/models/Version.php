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

    public function selected($option)
    {
        switch($option)
        {
            case 0:
                if($this->risk == '0'){
                    return 'selected';
                }
                break;
            case 1:
                if($this->risk == '1'){
                    return 'selected';
                }
                break;
            case 2:
                if($this->risk == '2'){
                    return 'selected';
                }
                break;
            case 3:
                if($this->risk == '3'){
                    return 'selected';
                }
                break;
        }
    }
}