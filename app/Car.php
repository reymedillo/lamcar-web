<?php

namespace App;
use App\ApiModel;

class Car extends ApiModel
{

    public function getCars($params)
    {
        $res = $this->callByAuth("GET", env('API_URL')."/cars", $params);

        $ret = [
            'cars' => $res->getBody()->cars,
            'pagination' =>  $res->getBody()->pagination,
        ];
        return $ret;
    }

    public function getCar($car_id)
    {
        $res = $this->callByAuth("GET", env('API_URL')."/cars/" . $car_id);

        if($res->getStatusCode() != 200){
            return false;
        }

        return $res->getBody();
    }

    public function delete($car_id)
    {
        $res = $this->callByAuth("DELETE", env('API_URL')."/cars/" . $car_id);
        return $res->getBody();
    }

    public function registerCar($form_params)
    {
        $res = $this->callByAuth("POST",  env('API_URL')."/cars", $form_params, true);
        return $res->getBody();
    }

    public function update($form_params, $car_id)
    {
        $res = $this->callByAuth("PUT",  env('API_URL')."/cars/" . $car_id, $form_params, true);
        return $res->getBody();
    }

    public function getTypes() {
        $res = $this->callByAuth("GET", env('API_URL')."/car_types" );
        return $res->getBody()->car_types;
    }

}
