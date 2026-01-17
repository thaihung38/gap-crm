<?php

namespace App\Http\Web\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Error extends Resource
{
    private string $message;
    private int $statusCode;

    public function __construct(string $message, int $statusCode = 400, $resource = [])
    {
        $this->message = $message;
        $this->statusCode = $statusCode;

        parent::__construct($resource);
    }

    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->setStatusCode($this->statusCode);
    }

    public function toArray(Request $request): array
    {
        return [
            'message' => $this->message,
            'data' => parent::toArray($request)
        ];
    }
}
