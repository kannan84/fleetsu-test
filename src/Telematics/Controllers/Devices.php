<?php

namespace Telematics\Controllers;

use Silex\Application;
use \Symfony\Component\HttpFoundation\Response;
use Telematics\Models\Device;

class Devices
{
    public static function getAll()
    {
        $_device = new Device();

        $devices = $_device->all();

        $payload = [];
        foreach($devices as $_dev) {
            $payload[$_dev->id] = $_dev->output();
        }

        $response = new Response('', 200);
        $response->setContent(json_encode($payload));
        $response->send();
    }
}