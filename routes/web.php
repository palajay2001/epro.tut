<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});



Route::view('/notfound', 'not-found');
Route::get('/loginform', [AdminController::class,'loginform'])->name('loginform');
Route::post('/login', [AdminController::class,'login'])->middleware('is_admin:role')->name('login');
Route::get('/register', [AdminController::class, 'signup'])->name('registerform');
Route::post('/register/users', [AdminController::class, 'signupUser'])->name('registerform_users');
Route::get('/test', [AdminController::class, 'test']);
Route::view('/index', 'index')->name('index');


// User 

Route::get('/user/register', [UserController::class, 'RegisterForm'])->name('registerform');
Route::post('/register', [UserController::class, 'Register'])->name('Register');
Route::get('/LoginForm',[UserController::class, 'LoginForm'])->name('LoginForm');
Route::post('/Login',[UserController::class, 'Login'])->name('Login');
Route::get('/StudentList',[UserController::class, 'StudentList'])->middleware('role:1')->name('admin');
Route::get('/StudentForm',[UserController::class, 'StudentForm'])->name('StudentForm');
Route::post('/Student/register',[UserController::class, 'StudentRegister'])->name('StudentRegister');
Route::any('/Student/delete/{id}',[UserController::class, 'Delete'])->name('Delete');
Route::any('/form/update/{id}',[UserController::class, 'updateform'])->name('updateform');
Route::any('/Student/update/{id}',[UserController::class, 'Update'])->name('Update');
Route::any('/teacher/studentlist',[UserController::class, 'teacherstudent'])->middleware('role:0')->name('testdata'); 
Route::any('/user/logout', [UserController::class,'Logout'])->name('logout');
