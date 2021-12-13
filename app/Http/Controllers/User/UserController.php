<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;



class UserController extends Controller
{
    public function index(){
        return view('user.home');
    }
    public function update_profile(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',

        ],[
         'name.required'=>'Input Your Name',
         'email.required'=>'Input Your Email',
         'phone.required'=>'Input Your Phone',

     ]);
        $user=User::findOrFail(Auth::id());
        $user->email=$request->email;
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->updated_at=Carbon::now();
        $user->save();
        $notification = array(
            'message' => 'Profile Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    public function image_update_view(){
        return view('user.image_update_view');
    }
    public function image_update(Request $request){
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ],[
         'image.required'=>'Input Your Image',
     ]);        
        $old_img = $request->old_image;
        if( $old_img == 'frontend/media/images.png'){
          $image=$request->file('image');
          $ext=$image->getClientOriginalExtension();
          $name_gen=hexdec(uniqid()).'.'.$ext;
          $path = 'frontend/media/'.$name_gen;
          Image::make($image)->resize(180, 150)->save($path );
          User::findOrFail(Auth::id())->update([
            
            'image'=>$path,

          ]);


     
        }
        else{
          unlink($old_img);
          $image=$request->file('image');
          $ext=$image->getClientOriginalExtension();
          $name_gen=hexdec(uniqid()).'.'.$ext;
          $path = 'frontend/media/'.$name_gen;
          Image::make($image)->resize(180, 150)->save($path );
          User::findOrFail(Auth::id())->update([
            
            'image'=>$path,

          ]);
        }

        $notification = array(
            'message' => 'Image Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }
    public function password_update_view(){
        return view('user.password_update_view');
    }

    public function password_update(Request $request){
         $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'con_password' => 'required',

        ],[
         'old_password.required'=>'Please Provide Your Current Password',
         'new_password.required'=>'Please Provide Your New Password',
         'con_password.required'=>'Please Confirm Your New Password',

     ]);

         $old_password=$request->old_password;
         $new_password=$request->new_password;
         $con_password=$request->con_password;
         
         $db_pass=Auth::user()->password;
         if(Hash::check($old_password,$db_pass)){
            if($new_password==$con_password){
                User::findOrFail(Auth::id())->update([
            
            'password'=>Hash::make($new_password),

              ]);
                Auth::logout();
                $notification = array(
            'message' => 'Password Successfully Changed ',
            'alert-type' => 'success'
        );
          return redirect()->route('login')->with($notification);
               
            }else{
                
            $notification = array(
            'message' => 'New Password and Confirm Password do not match ',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
            }
         }
         else{

            $notification = array(
            'message' => 'Old Password Is Incorrect ',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
         }

    }


}
