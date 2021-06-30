<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function login(Request $request)
  {
    $respuesta = Auth::attempt(['email' => $request->email, 'password' => $request->password,'estado' => 1]);


    if ($respuesta) {
      return response()->json([
        'authUser' => Auth::user(),
        'code' => 200
      ]);
    } else {
      return response()->json([
        'code' => 401
      ]);
    }
  }
  public function logout(Request $request)
  {

    $logout = Auth::logout();
    if ($logout) {
      return response()->json([
        'code' => 204
      ]);
    }
  }

  // Login
  public function showLoginForm()
  {
    $pageConfigs = ['bodyCustomClass' => 'bg-full-screen-image blank-page', 'navbarType' => 'hidden'];

    return view('/auth/login', [
      'pageConfigs' => $pageConfigs
    ]);
  }
}
