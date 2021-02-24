<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function responseSuccess(array $data, $message = 'Ok!')
    {
        $result = [
            'success' => true,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($result);
    }

    public function responseError($message = 'error', $messages = [])
    {
        $result = [
            'success' => false,
            'message' => $message,
        ];
        if (!empty($messages)) {
            $result['messages'] = $messages;
        }

        return response()->json($result);
    }
}
