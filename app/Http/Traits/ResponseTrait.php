<?php

namespace App\Http\Traits;

trait ResponseTrait
{
    function sendSuccess($message,$code = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
        ], $code);
    }

    function sendError($message, $code = 400)
    {

        return response()->json([
            'status' => false,
            'message' => $message
        ], $code);
    }

    function sendValidationError($data)
    {        return response()->json([
        'status' => false,
        'error' => $data
    ], 400);
    }

    function sendResponse($message,$data,$code = 200)
    {

        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
//            'redirect' => route($redirect)// Pass route URL here

        ], $code);
    }

    function sendResponseUrl($message,$redirect='',$code = 200)
    {

        return response()->json([
            'status' => true,
            'message' => $message,

            'redirect' => route($redirect)// Pass route URL here

        ], $code);
    }
}
