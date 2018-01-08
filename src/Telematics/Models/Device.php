<?php

namespace Telematics\Models;
use Illuminate\Support\Carbon as Carbon;
class Device extends \Illuminate\Database\Eloquent\Model
{
    protected $dateFormat = 'U';
    public $timestamps = FALSE;

    public function transaction(){
        return $this->hasMany('Telematics\Models\Transaction');
    }

    public function output($scope='list')
    {
        $output = [];
        $output['id']      = $this->id;
        $output['label']         = $this->label;
        $output['last_reported']         = $this->last_reported;
        $now = Carbon::now();
        $reported = Carbon::parse($this->last_reported);
        $interval = $now->diffInDays($reported);
        if($interval <=1){
            $output['status']="OK";
        }
        else{
            $output['status']="OFFLINE";
        }
        if($scope=='detail'){
            $transactionDetail = $this->transaction->last();
            if(!empty($transactionDetail)){
                $output['transaction'] = $transactionDetail;
                $output['mapSrc'] = 'https://www.google.com/maps/embed/v1/place?key=AIzaSyAxjxzwc8YFQBEhf30ollgP--KqCRwFqLE&q='.$transactionDetail->lat.','.$transactionDetail->lng;
            }
        }
        return $output;
    }
}