<?php

namespace App\Http\Helper;
use App\Http\Helper\CallLog;
use DateTime;
use App\Users;
use Illuminate\Http\Request;

class ResponseObject
{
    /**
    * Builds the return object
    *
    * The return object hold everything about the general success of the
    * call being made as well as the data to be returned.
    *
    * @param bool $general_status True|False based on if the call
    * encounted any issues while executing 
    * @param string $general_message An English message explaing what
    * has happened in the call
    * @param string $return_object The name of the data being returned
    * @param string $data The actual data payload to be returned
    * @param int $code Number code representing the status and mesage
    *
    * @return string
    */
    public static function result($general_status = false, $general_message = '', $return_object = 'data', $data, $code = 0, $call_id = null)
    {

        $outcome = [
            'status' => $general_status,
            'message' => $general_message,
            'call_id' =>  $call_id,
            'code' => $code
        ];

        return [
            'outcome' => $outcome,
            $return_object => $data
        ];
    }
}
