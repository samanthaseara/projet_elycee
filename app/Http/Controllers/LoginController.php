<?php
namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) return redirect()->intended('post');
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email'    => 'required|email',
                'password' => 'required', // todo password return form front html5 and server ?
                'remember' => 'in:remember' // todo tester remember
            ]);
            $remember = !empty($request->input('remember')) ? true : false;
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials, $remember)) {
                return redirect('post')->with(['message' => 'success']);
            } else {
                return back()->withInput($request->only('email', 'remember'))->with(['message' => trans('app.noAuth'), 'alert' => 'warning']);
            }
        } else return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->home();
    }
}