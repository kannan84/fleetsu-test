<?php

namespace Telematics\Models;
use Illuminate\Support\Carbon as Carbon;
class Transaction extends \Illuminate\Database\Eloquent\Model
{
    protected $dateFormat = 'U';
    public $timestamps = FALSE;
    
    public function device(){
        return $this->belongsTo('Telematics\Models\Device');
    }

    public function output()
    {
        $output = [];
        $output['id']      = $this->id;
        $output['label']         = $this->device->label;
        $output['latitude']         = $this->lat;
        $output['longitude']         = $this->lng;
        $output['reported_at']         = $this->reported_at;
        return $output;
    }
}