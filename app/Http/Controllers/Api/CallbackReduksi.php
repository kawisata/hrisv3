<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberReduksi;
use App\Models\MemberReduksiInputFrontliner;


class CallbackReduksi extends Controller
{
    public function callbackReduksi(Request $request)
    {
        $jsondecode = json_decode($request->getContent(), true);

        $requestdate = isset($jsondecode['requestDate']) ? $jsondecode['requestDate'] : "";
        $code = isset($jsondecode['code']) ? $jsondecode['code'] : "";
        $message = isset($jsondecode['message']) ? $jsondecode['message'] : "";
        $nipp = isset($jsondecode['nipp']) ? $jsondecode['nipp'] : "";

        if (in_array("", [$code, $message, $nipp])) {
            return response()->json([
                'code' => 400,
                'status' => false,
                'message' => "Gagal! Parameter tidak lengkap!"
            ]);
        }
        // untuk save
       // $callbacksave = CallbackInfo::create([
        $callbacksave = MemberReduksi::whereNipp($nipp)->update([
            'code' => $code,
            'message' => $message
        ]);
        $callbacksave = MemberReduksiInputFrontliner::whereNipp($nipp)->update([
            'code' => $code,
            'message' => $message
        ]);
        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Data berhasil!",
            'data' => $callbacksave
        ]);
    }
}
