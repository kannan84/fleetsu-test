<?php 
require_once __DIR__.'/vendor/autoload.php';
include 'bootstrap.php';

use Telematics\Models\Device;
use Telematics\Models\Transaction;
use Telematics\Controllers\Devices;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon as Carbon;

$app = new Silex\Application();
// production environment - false; test environment - true
$app['debug'] = true;
$app['api_key'] = 'asdasdasdasd'; 
$app->get('/devices', function(){
$_device = new Device();

$devices = $_device->all();

$payload = [];
foreach($devices as $_dev) {
    $payload[] = $_dev->output();
}

$list = $payload; 
 return json_encode($list);
});
 
$app->get('/devices/{id}', function (Silex\Application $app, $id){
    $devices = Device::find($id);
    if (!isset($devices)) {
        $app->abort(404, "id {$id} does not exist.");
    }else{
        return json_encode($devices->output('detail'));
    }
});

$app->post('/devices', function(Request $request) use ($app) {
    $_device = $request->get('label');
    $_device_reported = $request->get('last_reported');
    $devices = Device::where('label',$_device)->first();
    if (isset($devices)) {
        $app->abort(400, "Device already exist.");
    }else{
        $device = new Device();
        $device->label = $_device;
        $device->last_reported = $_device_reported;
        $device->save();
        return new Response('Device created ',201);
    }
  
});


$app->post('/transactions', function(Request $request) use ($app) {
    $_txn_lat = $request->get('lat');
    $_txn_lng = $request->get('lng');
    $_txn_reported_at = $request->get('reported_at');
    $_device_label = $request->get('label');
    $device = Device::where('label',$_device_label)->first();

    //$device = Device::find(1);
    if(!$device){
        return new Response('Device label is not available',400);
    }
    //return new Response(json_encode($device->output()),201);
    //$device->label = $_device_label;
    $device->last_reported = $_txn_reported_at;
    $device->save();

    $txn = new Transaction();
    $txn->device_id = $device->id;
    $txn->lat = $_txn_lat;
    $txn->lng = $_txn_lng;
    $txn->reported_at = $_txn_reported_at;
    $txn->save();
    return new Response('Message Created ',201);
});

$app->run();
?>	