<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (Exception $e, $request) {
            if ($e instanceof TokenBlacklistedException) {
                return response([
                    'error' => 'Token Cannot Be used. Get new one'
                ],Response::HTTP_BAD_REQUEST);
                
            }else if ($e instanceof TokenInvalidException) {
                return response([
                    'error' => 'Token in Invalid'
                ],Response::HTTP_BAD_REQUEST);
            }else if ($e instanceof TokenExpiredException) {
                return response([
                    'error' => 'Token is Expired'
                ],Response::HTTP_BAD_REQUEST);
            }else if ($e instanceof JWTException) {
                return response([
                    'error' => 'Token in not provided'
                ],Response::HTTP_BAD_REQUEST);
            }
        });
    }
}
