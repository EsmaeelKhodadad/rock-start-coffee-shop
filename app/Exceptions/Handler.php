<?php

namespace App\Exceptions;

use http\Exception\RuntimeException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

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
    public function register(): void
    {
        $this->renderable(static function (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'payload' => [],
            ], ResponseAlias::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json',]);
        });
    }
}
