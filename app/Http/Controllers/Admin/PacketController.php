<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Operation;
use App\Models\Packet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacketController extends Controller
{
    public function index(){

        $packets = Packet::all();
        return view('admin.packet-shop.packet-list',compact('packets'));
    }
}
