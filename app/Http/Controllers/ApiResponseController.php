<?php
//https://github.com/f9webltd/laravel-api-response-helpers
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class ApiResponseController extends Controller
{
    use ApiResponseHelpers;

    public function index(): JsonResponse
    {
        //return $this->respondWithSuccess();

        //$users = collect([10, 20, 30, 40]);
        //return $this->setDefaultSuccessResponse([])->respondWithSuccess($users);

        $users = collect([10, 20, 30, 40]);
        return $this->respondWithSuccess($users);
    }
}