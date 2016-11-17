<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;

use App\Http\Requests;

class DriverController extends Controller
{
    public function __construct(Driver $driver) {
        $this->driver = $driver;
    }

    protected function getIndex(Request $request) {
        $params = array();
        $prev_search = array();
        $params['offset'] = config("define.perPage");

        if($request->has('page')) {
            $params['page'] = $request->input('page');
        }

        if($request->has('search')) {
            $params['search'] = $request->input('search');
            $prev_search['search'] = $request->input('search');
        }
        $_drivers = $this->driver->getDrivers($params);

        $drivers = $_drivers->drivers;
        $pagination = $_drivers->pagination;

        return view('admin.drivers.index', compact('drivers', 'pagination', 'prev_search'));
    }

    protected function postCreate(Request $request) {
        $res = $this->driver->registerDriver($request->input());
        return response()->json($res, 200);
    }

    protected function getEdit($id) {
        $res = $this->driver->getEdit($id);
        return response()->json($res, 200);
    }

    protected function putEdit(Request $request, $id) {
        $res = $this->driver->putEdit($request->all(), $id);
        return response()->json($res, 200);
    }

    protected function deleteDestroy($id) {
        $res = $this->driver->deleteDestroy($id);
        return response()->json($res, 200);
    }

}
