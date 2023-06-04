<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function notification(Request $request)
    {
        log::info('notification');
        log::info($request->all());
        $fp = fopen(realpath(__DIR__ . "/../../../pem/kcb_uat_publickey.pem"), "r");
        $cert = fread($fp, 8192);
        fclose($fp);

        $data = $request->getContent();
        $signature = $request->header('signature');

        $success = [
            "transactionInfo" => [
                "transactionId" => uniqid()
            ]
        ];

        $error = [];

        $ok = openssl_verify($data, $signature, $cert);
        if ($ok === 1) {

            return response($success)
                ->withHeaders([
                    'messageID' => $request->header('messageID'),
                    'originatorConversationID' => Str::uuid(),
                    "statusCode" => "0",
                    "statusMessage" => "Notification received"
                ]);
        } elseif ($ok === 0) {
            return response($error)
                ->withHeaders([
                    'messageID' => $request->header('messageID'),
                    'originatorConversationID' => Str::uuid(),
                    "statusCode" => "1",
                    "statusMessage" => "Invalid Request"
                ]);
        } else {
            return response($error)
                ->withHeaders([
                    'messageID' => $request->header('messageID'),
                    'originatorConversationID' => Str::uuid(),
                    "statusCode" => "1",
                    "statusMessage" => "Invalid Request"
                ]);
        }
    }

    public function query(Request $request)
    {
        log::info('query');
        log::info($request->all());
        $fp = fopen(realpath(__DIR__ . "/../../../pem/kcb_uat_publickey.pem"), "r");
        $cert = fread($fp, 8192);
        fclose($fp);

        $data = $request->getContent();
        $signature = $request->header('signature');

        $success = [
            "transactionInfo" => [
                "transactionId" => uniqid(),
                "utilityName" => "Kahustle Premium Ads",
            ]
        ];

        $error = [];

        $ok = openssl_verify($data, $signature, $cert);
        if ($ok === 1) {

            return response($success)
                ->withHeaders([
                    'messageID' => $request->header('messageID'),
                    'originatorConversationID' => Str::uuid(),
                    "statusCode" => "0",
                    "statusMessage" => "Processed Successfully"
                ]);
        } elseif ($ok === 0) {
            return response($error)
                ->withHeaders([
                    'messageID' => $request->header('messageID'),
                    'originatorConversationID' => Str::uuid(),
                    "statusCode" => "1",
                    "statusMessage" => "Invalid Request"
                ]);
        } else {
            return response($error)
                ->withHeaders([
                    'messageID' => $request->header('messageID'),
                    'originatorConversationID' => Str::uuid(),
                    "statusCode" => "1",
                    "statusMessage" => "Invalid Request"
                ]);
        }
    }
}
