<?php

namespace App\core;

use App\core\AppCore;
use App\core\Controller;

class RestController extends Controller
{

    protected function jsonRender($status, $status_msg, $data)
    {
        header("HTTP/1.1 $status $status_msg");
        header("Content-Type:application/json");

        $response = array(
            'status' => $status,
            'status_message' => $status_msg,
            'datas' => $data
        );

        $json_response = json_encode($response);

        echo $json_response;
    }

    public function notFound()
    {
        $this->jsonRender(404, "Ressource not found", null);
    }

}
