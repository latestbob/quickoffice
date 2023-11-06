<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        //return parent::render($request, $exception);

        if($this->isHttpException($exception))
    {
        switch ($exception->getStatusCode()) 
            {
            // not found
            case 404:
            return redirect()->route('notfound');
            break;

            // internal error
            case '500':
            return redirect()->route('notfound');
            break;

          
        }
    }
    else
    {
            return parent::render($request, $exception);
    }
    }

  protected function unauthenticated($request, AuthenticationException $exception)
  {
      if($request->expectsJson()){
          return response()->json(['error' => 'Unauthenticated.'], 401);
      }

      $guard= Arr::get($exception->guards(),0);

      switch($guard){
          case 'office': // for shop login
              $login= 'office.login';
              break;

        case 'admin': //for admin login
            $login='admin.login';
            break;
         
          default:
              $login='office.login'; // default for customer login
              break;
      }
      return redirect()->guest(route($login));
  }
}
