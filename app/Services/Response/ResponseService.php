<?php

namespace App\Services\Response;

// Response servive - exist for sending more personalized(if it's necessary) JSON response

class ResponseService                                                                                                                                                                         //  Г (Here we can send our errors if for example we failed validation in controller)
{                                                                                                                                                                                             // v
    protected static function responseParams($status,$code,$errors = [],$data = []) // This static method make a standart forms for answers. It's return array like this [status(true||false),errors,data('name'=>'Victor','lastname'=>'Lastname')]
    {
        return [
          'status' => $status,
          'code'   => $code,
          'errors' => $errors,
          'data'   => $data,
        ];
    }

    protected static function SendJsonResponse($status,$code,$errors,$data) // This method transform data into JSON format
    {
        return response()->json([
          self::responseParams($status,$code,$errors,$data);
        ]);
    }

    public function success($data = []) // Call of everything all right. Return JSON object with status true and code 200.
    {
        return self::SendJsonResponse(true,200,[],$data);
    }

    public function notFound($errors = [], $data = []) // Call this method if validation failed because data for response not found
    {
        return self::SendJsonResponse(false,404,$errors,$data);
    }
}
