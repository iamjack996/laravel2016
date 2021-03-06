<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/api',
        '/api/*',
        '/article',
        '/article/*',
        '/user',
        '/user/*',
        '/apply',
        '/apply/*',
        '/notice',
        '/notice/*',
        '/collection',
        '/collection/*',
        '/followapi',
        '/followapi/*',
        '/reportapi',
        '/reportapi/*',
    ];

/** 14      * Determine if the session and input CSRF tokens match. 15      * 16      * @param \Illuminate\Http\Request $request 17      * @return bool 18      */
  protected function tokensMatch($request){
    // If request is an ajax request, then check to see if token matches token provider in 22         // the header. This way, we can use CSRF protection in ajax requests also.
      $token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->input('_token');
      return $request->session()->token() == $token;
  }


}
