<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;



class ForgotPasswordController extends Controller

{

      /**

       * Write code on Method

       *

       * @return response()

       */

      public function showForgetPasswordForm()

      {
        $title = "Forget Password";
        return view('auth.forgetPassword',get_defined_vars());

      }



      /**

       * Write code on Method

       *

       * @return response()

       */

      public function submitForgetPasswordForm(Request $request)

      {

          $request->validate([

              'email' => 'required|email|exists:users',

          ]);



          $token = Str::random(64);



          DB::table('password_resets')->insert([

              'email' => $request->email,

              'token' => $token,

              'created_at' => Carbon::now()

            ]);

        //   $user = User::where('is_admin',1)->first();
              
          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $user = User::where('email', $request->email)->first();
            // brisgrocer@gmail.com
            if ($user && $user->is_admin == 1) {
                $message->to('brisgrocer@gmail.com');
            } else {
                $message->to($request->email);
            }

              $message->subject('Reset Password');

          });



          return back()->with('message', 'We have e-mailed your password reset link! Please check your email and click on the reset link.');

      }

      /**

       * Write code on Method

       *

       * @return response()

       */

      public function showResetPasswordForm($token) {
        $title = "Forget Password";
         return view('auth.forgetPasswordLink', ['token' => $token, 'title' => $title]);

      }



      /**

       * Write code on Method

       *

       * @return response()

       */

      public function submitResetPasswordForm(Request $request)

      {

          $request->validate([

              'email' => 'required|email|exists:users',

              'password' => 'required|string|min:6|confirmed',

              'password_confirmation' => 'required'

          ]);



          $updatePassword = DB::table('password_resets')

                              ->where([

                                'email' => $request->email,

                                'token' => $request->token

                              ])

                              ->first();



          if(!$updatePassword){

              return back()->withInput()->with('error', 'Invalid token!');

          }



          $user = User::where('email', $request->email)

                      ->update(['password' => Hash::make($request->password)]);



          DB::table('password_resets')->where(['email'=> $request->email])->delete();



          return redirect('/')->with('message', 'Your password has been changed!');

      }

}
