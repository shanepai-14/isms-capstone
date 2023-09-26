<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function index(){
        return view ('auth.login');
    }
    public function adminDashboard(){
        return view ('auth.forgot');
    }
    public function studentDashboard(){
        return view ('auth.reset');
    }

    public function register(){
        return view ('auth.register');
    }

    public function forgot(){
        return view ('auth.forgot');
    }
    public function reset(){
        return view ('auth.reset');
    }

    public function registerUser(Request $request)
    {
       
        $validator=Validator::make($request->all(),[
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'cpassword' => 'required|string|min:8|same:password',
        ],[
            'cpassword.same' => 'Password did not match!' ,
            'cpassword.required' => 'Confirm Password is required!' ,
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400, 
                'messages' => $validator->getMessageBag()
            ]);
        }else{

            // $user = User::create([
            //     'username' => $request->input('username'),
            //     'email' => $request->input('email'),
            //     'password' => Hash::make($request->input('password')),
            //     'role' => 'student', 
            //     'uuid' => Str::uuid(),
            // ]);
    
            // return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
         

try{

            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'student';
            $user->uuid = Str::uuid();
            $user->save();

            return response()->json([
           'status' => 200,
           'message' => 'Registered Successfully!'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 200,
                'message' => $e
                 ]);
        }

        }

        
    }
    public function loginUser(Request $request)
    {
       $validator = Validator::make($request->all(),[
          'login'=>'required|min:4|max:50',
          'password'=>'required|min:8|max:50',

       ]);

  if($validator->fails()){
    
    return response()->json([
        'status' => 400,
        'messages' => $validator->getMessageBag()
    ]);
  }else {

            $credentials = $request->only('login', 'password');
    
            // Find the user by email or username
            $user = User::where('email', $credentials['login'])
                        ->orWhere('username', $credentials['login'])
                        ->first();
        
            if ($user && auth()->attempt(['email' => $user->email, 'password' => $credentials['password']])) {
                // If authentication is successful
                $role = $user->role;
        
                if ($role == 'admin') {
                    session(['role' => 'admin']);
                } elseif ($role == 'student') {
                    session(['role' => 'student']);
                }
              
                return response()->json(['status' => 200, 'message' => 'Login successful']);
            } else {
                // If authentication fails
             
                return response()->json(['status' => 401, 'message' => 'Invalid credentials']);
                
            }

        }

            

      
        
    }

}
