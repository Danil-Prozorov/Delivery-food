<?php

namespace App\Services\Traits\Response;

// Response service - exist for sending more personalized(if it's necessary) JSON response

trait ResponseJSON                                                                                                                                                                             //  Г (Here we can send our errors if for example we failed validation in controller)
{                                                                                                                                                                                             //  v
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
          self::responseParams($status,$code,$errors,$data)
        ]);
    }

    public function success($data = []) // Call if everything all right. Return JSON object with status true and code 200.
    {
        return self::SendJsonResponse(true, 200, [], $data);
    }

    public function noContent($data = []) // Call in case if content/item not exist or not founded in DB
    {
        return self::SendJsonResponse(false, 204, [], $data);
    }

    public function resetContent($data = []) // Call in case for response, when you update anything
    {
        return self::SendJsonResponse(true, 205, [], $data);
    }

    public function badRequest($errors = []) // Call if request was wrong
    {
        return self::SendJsonResponse(false, 400, $errors, []);
    }

    public function itemGone($errors = []) // Call in case if item in DB was gone or deleted
    {
        return self::SendJsonResponse(false, 410, $errors, []);
    }

    public function notFound($errors = [], $data = []) // Call this method if validation failed because data for response not found
    {
        return self::SendJsonResponse(false, 404, $errors, $data);
    }
}
