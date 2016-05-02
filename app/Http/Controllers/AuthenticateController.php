<?php

// Same as Controller.php
// folder: /app/Http/Controllers/xxxx
namespace App\Http\Controllers;

// request and response
use Illuminate\Http\Request;

// /app/Http/Requests/Request.php
use App\Http\Requests;

// /app/Http/Controllers/Controller.php
use App\Http\Controllers\Controller;

// JWT auth
use JWTAuth;

// Tymon
// JWTAuth
// Exceptiions
// JWTException
use Tymon\JWTAuth\Exceptions\JWTException;

// User
use App\User;

class AuthenticateController extends Controller
{
  // initial authenticate controller
  public function __construct()
  {
    // Apply the jwt.auth middleware to all methods in this controller
    // except for the authenticate method. We don't want to prevent
    // the user from retrieving their token if they don't already have it

    // middleware
    // jwt.auth
    // except
    // autheticate route
    // guarding for all methods.
    $this->middleware('jwt.auth', ['except' => ['authenticate']]);
  }

    /**
     * Return the user
     *
     * @return Response
     */
    // Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    // conroller: AuthenticateController
    // route: authenticate
    // func: only index
    // Route::resource
    public function index()
    {
      // Retrieve all the users in the database and return them
      // hit authenticate route, then return all users.        
      $users = User::all();

      return $users;
    }

    /**
     * Return a JWT
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
      // Pass in $request
      // get email and password
      $credentials = $request->only('email', 'password');

      // Need to try and catch, for bad token
      try {
        // JWTAuth::attempt($credentials)
        // call JWTAuth::attempt
        // $credentials, array or what?
        if (! $token = JWTAuth::attempt($credentials)) {
          // response()
          // json
          // error
          // string: invalid_credentials
          // code: 401
          return response()->json(['error' => 'invalid_credentials'], 401);
        }
      } catch (JWTException $e) {
          // response()
          // json
          // error
          // string: could_not_create_token
          // code: 500
          return response()->json(['error' => 'could_not_create_token'], 500);
      }

      // if no errors are encountered we can return a JWT
      // $token
      // compact will look into variable table
      // $token will be assigned with value.  
      return response()->json(compact('token'));
  }
}
