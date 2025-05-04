<?php

namespace App\Traits;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;


trait HttpResponse{
    protected function success(array|JsonResource $data, string $message = null, int $code = 200, bool $paginate = false): JsonResponse
    {
        $response = [
            "status" => "success",
            "message" => $message,
        ];

        if ($data) {
            if($paginate) {
                $response['data'] = $data[0]['data'];
                $response['links'] = $data[0]['links'];
                $response['meta'] = $data[0]['meta'];
            }
            else{
                $response["data"] = $data;
            }
        }
                
        return response()->json($response, $code);
    }

    protected function error(array $data, string $message = null, Int $code = 500): JsonResponse
    {
        $response = [
            "status" => "error",
            "message" => $message,
        ];

        !$data ? "" : $response["data"] = $data;

        return response()->json($response, $code);
    }
}