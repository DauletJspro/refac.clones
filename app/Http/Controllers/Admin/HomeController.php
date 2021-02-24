<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        $data = Home::getItems();
        return view('home.index', ['data' => $data]);
    }

    public function ajax(Request $request)
    {
        $week_number = $request->week_number ?? 0;
        $method = $request->type;
        switch ($method) {
            case 'registered_count':
                $result = Home::getChartData($week_number, $method);
                break;
            case 'bought_packet_count':
                $result = Home::getChartData($week_number, $method);
                break;
        }

        return $result;
    }
}
