<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Car;
use App\Driver;
use Session;
use App\Helpers;

class CarController extends Controller
{
    protected $car;

    public function __construct(Car $car, Driver $driver)
    {
        $this->car      = $car;
        $this->driver   = $driver;
    }

    protected function getIndex(Request $request)
    {
        $params = array();
        $prev_search = array();
        $params['offset'] = config("define.perPage");

        if($request->input('page')) {
            $params['page'] = $request->input('page');
            Session::put('car_page', $request->input('page'));
        } else {
            Session::forget('car_page');
        }

        if($request->input('search')) {
            $params['search'] = $request->input('search');
            $prev_search['search'] = $request->input('search');
        }

        $temp_Cars = $this->car->getCars($params);
        $car_types = $this->car->getTypes();
        //drivers list
        $params['list'] = true;
        $drivers   = $this->driver->getDrivers($params);
        $drivers   = $drivers->drivers;

        $cars = $temp_Cars['cars'];
        $pagination = $temp_Cars['pagination'];

        return view('admin.cars.index', compact('cars', 'car_types', 'drivers', 'pagination', 'prev_search'));

    }

    protected function getEdit($car_id)
    {
        $res = $this->car->getCar($car_id);
        return response()->json($res, 200);
    }

    protected function getDelete($car_id)
    {
        $page = '';
        $res = $this->car->delete($car_id);
        if(Session::get('car_page')) $page = '?page=' . Session::get('car_page');
        return response()->json($res, 200);
    }

    protected function postEdit(Request $request, $car_id)
    {
        $res = $this->car->update($request->all(), $car_id);
        return response()->json($res, 200);
    }

    protected function postCreate(Request $request)
    {
        $res = $this->car->registerCar($request->input());
        return response()->json($res, 200);
    }

}
