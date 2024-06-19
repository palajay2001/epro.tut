<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // User can register form
    public function RegisterForm(){
        return view('user.register');
    }

    public function Register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $data = new User();

        $data->name=$request->input('name');
        $data->email=$request->input('email');
        $password=$request->input('password');
        $data->password=Hash::make($password);
        $data->save();

        Return redirect()->Route('LoginForm')->withErrors('message', 'Register has been successfull!');
    }


    public function LoginForm(){
        return view('user.login');
    }
    
    public function Login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            ]);
            
            if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user(); 
            if ($user->role == 1) {
                return redirect()->route('admin')->with('message', 'Admin is logged in!');
            } else {
                return redirect()->route('testdata')->with('message', 'User has been logged in!');
            }
        } else {
            return redirect()->route('registerform')->withErrors(['message' => 'Invalid credentials!']);
        }
    }

    // List of data of Student created by teacher and Admin
    public function StudentList(){
        $data=Student::all();
        return view('user.student', compact('data'));
        }
        
    // Studenrt can regsiter here
    public function StudentForm(){
        return view('user.studentform');
    }

    public function StudentRegister(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'class'=>'required',
        ]);

        
        $data=new Student();
        $id=Auth::id();
        $data->name=$request->input('name');
        $data->user_id=$id;
        $data->email=$request->input('email');
        $data->class=$request->input('class');
        $data->save();

        if (Auth()->user()->role==1) {
            return redirect()->route('admin')->withErrors('message', 'Student has been register!');
        }else{
            return redirect()->route('testdata')->withErrors('message', 'User has been Logged in!');
        }
    }

    // User(Admin and teacher) can delete
    public function Delete($id){
        $data=Student::find($id);
        if ($data) {
            $data->delete();
            if (Auth()->user()->role==1) {
                return redirect()->route('admin')->withErrors('message', 'Student has been deleted!');
            }else{
                return redirect()->route('testdata')->withErrors('message', 'Student has been deleted!');
            }
        }
    }

    // User(Admin && teacher ) can update data of students
    public function updateform($id){
        $data=Student::find($id);
        return view('user.updatestudent', compact('data'));
    }

    public function Update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'class'=>'required',
        ]);

        
        $data=Student::find($id);
        $data->name=$request->input('name');
        $data->email=$request->input('email');
        $data->class=$request->input('class');
        $data->save();

        if (Auth()->user()->role==1) {
            return redirect()->route('admin')->withErrors('message', 'Student has been updated!');
        }else{
            return redirect()->route('testdata')->withErrors('message', 'Student has been updated!');
        }
    }

    // List of Student which is created by Teacher only
    public function teacherstudent(Request $request)
    {
        $id = Auth::id();
        $data = User::with('Student')->where('id', $id)->first();
        return view('user.teacherstudent', compact('data'));
    }

    // User(Teacher and User can be log out from this applications!)
    public function Logout(Request $request){
        Auth::logout();
        return redirect()->route('LoginForm')->withErrors('message', 'loged out!');
    }
}
