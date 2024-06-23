<?php

namespace App\Exceptions;

use Throwable;
use App\traits\jsontrait;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use jsontrait;
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
  public function register(): void
    {
      
   $this->renderable(function(NotFoundHttpException $e ,$request){
if($request->is('api/*')){
    return $this->senderror('not found',404);
}
    });
}
}