<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LSNepomuceno\LaravelA1PdfSign\ManageCert;

class PdfCertificateController extends Controller
{
    public function view()
    {
        return view('certification.pdf-certification');
    }

    public function dummyFunction(Request $request){
        try {
            $cert = new ManageCert;
            $cert->fromUpload($request->pfxUploadedFile, $request->password);

            Certificate::create([
            'certificate' => $cert->encryptBase64BlobString($cert->getCert()->original),
            'password'    => $cert->getEncrypter()->encryptString($request->password),
            'hash'        => $cert->getHashKey(), // IMPORTANT
            'user_id'     => auth()->user()->id,
            ]);

            return redirect()->back();

        } catch (\Throwable $th) {
            dd($th);
        }

        // For MySQL
    }
}
