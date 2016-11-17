<?php

namespace App;

use App\ApiModel;

class Driver extends ApiModel
{
    public function getDrivers($params=null) {
        $res = $this->callByAuth("GET", env('API_URL')."/drivers" ,$params);
        return $res->getBody();
    }

    public function registerDriver($form_params) {
        $res = $this->callByAuth("POST",  env('API_URL')."/drivers", $form_params, true);
        return $res->getBody();
    }

    public function getEdit($id) {
        $res = $this->callByAuth("GET", env('API_URL')."/drivers/" . $id);

        if($res->getStatusCode() != 200){
            return false;
        }

        return $res->getBody();
    }

    public function putEdit($form_params, $id) {
        $res = $this->callByAuth("PUT",  env('API_URL')."/drivers/" . $id, $form_params, true);
        return $res->getBody();
    }

    public function deleteDestroy($id) {
        $res = $this->callByAuth("DELETE", env('API_URL')."/drivers/" . $id);
        return $res->getBody();
    }

}
