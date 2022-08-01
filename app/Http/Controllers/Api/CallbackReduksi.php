<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CallbackInfo;

class CallbackReduksi extends Controller
{
    public function callbackReduksi(Request $request)
    {
        $jsondecode = json_decode($request->getContent(), true);

        $requestdate = isset($jsondecode['requestDate']) ? $jsondecode['requestDate'] : "";
        $code = isset($jsondecode['code']) ? $jsondecode['code'] : "";
        $message = isset($jsondecode['message']) ? $jsondecode['message'] : "";
        $nipp = isset($jsondecode['nipp']) ? $jsondecode['nipp'] : "";

        if (in_array("", [$requestdate, $code, $message, $nipp])) {
            return response()->json([
                'code' => 400,
                'status' => false,
                'message' => "Gagal! Parameter tidak lengkap!"
            ]);
        }

        $callbacksave = CallbackInfo::create([
            'request_date' => $requestdate,
            'code' => $code,
            'message' => $message,
            'nipp' => $nipp
        ]);
        
        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Data berhasil!",
            'data' => $callbacksave
        ]);
    }
}
