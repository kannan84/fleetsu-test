<?php 
require_once __DIR__.'/vendor/autoload.php';
include 'bootstrap.php';

use Telematics\Models\Device;
use Telematics\Controllers\Devices;
use \Silex\Application;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon as Carbon;

$app = new Silex\Application();
// production environment - false; test environment - true
$app['debug'] = true;
 
$app->get('/devices', function(){
$_device = new Device();

$devices = $_device->all();

$payload = [];
foreach($devices as $_dev) {
    $payload[$_dev->id] = $_dev->output();
}

$list = $payload; 
 return json_encode($list);
});
 
$app->get('/devices/{id}', function (Silex\Application $app, $id){
$devices = Device::find($id);
 if (!isset($devices)) {
     $app->abort(404, "id {$id} does not exist.");
 }else{
    $now = Carbon::now();
    $reported = Carbon::parse($devices['last_reported']);
    $interval = $now->diffInDays($reported);
    if($interval <=1){
            $devices['image'] = 'success.jpg';
        }
        else{
            $devices['image'] = 'failure.jpg';
        }
    return json_encode($devices);
 }
});

$app->post('/devices', function(Request $request) use ($app) {
    $_device = $request->get('label');
    $_device_reported = $request->get('last_reported');
    $device = new Device();
    $device->label = $_device;
    $device->last_reported = $_device_reported;
    $device->save();

    /*if ($device->id) {
        $payload = [
            'device_id' => $device->id,
            'message_uri' => '/' . $message->id,
            ];
        $code = 201;
    } else {
        $code = 400;
        $payload = [];
    }*/
return new Response('Message Created ',201);
  //  return $app->json($payload, $code);
});

 
$app->run();
?>	