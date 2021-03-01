<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\MakeRequestRequest;
use App\Http\Requests\makeRequestToBuyPacket;
use App\Models\UserPacket;
use Illuminate\Http\Request;

class PacketPurchaseController extends BaseController
{
    public function fromBalance()
    {

    }

    public function online()
    {

    }

    public function makeRequest(MakeRequestRequest $request, int $packetId)
    {

    }

    public function deleteRequest()
    {

    }

    public function acceptRequest()
    {

    }

    public function ajax(Request $request)
    {
        $type = $request->type;
        $packetId = $request->packet_id;
        $result = [];
        switch ($type) {
            case 'makeRequest':
                $makeRequest = new MakeRequestRequest();
                $makeRequest->packet_id = $packetId;
                $result = $this->makeRequest($makeRequest, $packetId);
                break;
        }

        return $result;

    }


    public function implementBonus($userPacket)
    {

    }
}
