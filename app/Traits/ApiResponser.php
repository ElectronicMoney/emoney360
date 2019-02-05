<?php

namespace App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
trait ApiResponser
{
    /**
     * @param string $data
     * @param string $code
     * @return array
     */
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    /**
     * @param string $message
     * @param string $code
     * @return array
     */
    protected function errorResponse($message, $code) {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * @param object $collection
     * @param int $code
     * @return array
     */
    protected function showAll(Collection $collection, $code = 200) {
        return $this->successResponse(['data' => $collection], $code);
    }

    /**
     * @param object $model
     * @param int $code
     * @return array
     */
    protected function showOne(Model $model, $code = 200)
    {
        return $this->successResponse(['data' => $model], $code);
    }

}
