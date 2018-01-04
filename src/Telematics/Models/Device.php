<?php

namespace Telematics\Models;
use Illuminate\Support\Carbon as Carbon;
class Device extends \Illuminate\Database\Eloquent\Model
{
    protected $dateFormat = 'U';
    public $timestamps = FALSE;
    public function output()
    {
        $output = [];
        /*$output['body']         = $this->body;
        $output['user_id']      = $this->user_id;
        $output['user_uri']     = '/user/' .$this->user_id;
        $output['created_at']   = $this->created_at;
        $output['image_url']    = $this->image_url;
        $output['message_id']   = $this->id;
        $output['message_uri']  = '/messages/' .$this->id;
*/
        $output['id']      = $this->id;
        $output['label']         = $this->label;
        $output['last_reported']         = $this->last_reported;
        $now = Carbon::now();
        $reported = Carbon::parse($this->last_reported);
        $interval = $now->diffInDays($reported);
        if($interval <=1){
            $output['image'] = 'success.jpg';
        }
        else{
            $output['image'] = 'failure.jpg';
        }
        return $output;
    }
}
