<?php

namespace App\Http\Controllers\Auth;

use Hash;
use App\Models\Users\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Tasks\TaskService;
use App\Models\Likes\Like;
use App\Models\Users\UserCompany;
use App\Models\Posts\Post;
use App\Models\Jobs\Job;
use App\Models\Clients\Candidate;
use App\Models\Clients\Company;
use Thomaswelton\LaravelGravatar\Facades\Gravatar;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskService $taskService)
    {
        $this->middleware('web');
        $this->taskSvc = $taskService;
    }

    public function adminlist()
    {
        $status = "";
        $message = "";
        $users = User::all();
        return view('layouts.admin_list', compact('message', 'status', 'users'));
    }

    public function updateAdmin()
    {
        $message = "User successfully updated!";
        $status = 1;

        $requestArray =  request()->all();
        $id = $requestArray['user_id'];

        $validator = Validator::make($requestArray, [
            'name' => 'required',
            'email' => 'required',
            'handphone' => 'numeric'
        ]);

        if ($validator->fails()) {
            $errorArray = $validator->errors()->all();
            $message = implode(" ", $errorArray);
            $status = 0;
            return redirect()->back()->with(['message' => $message, 'status' => $status]);
        } else {
            $user = User::where('id', $id)->first();
            $user -> name = $requestArray['name'];
            $user -> email =  $requestArray['email'];
            $user -> handphone = $requestArray['handphone'];
            $user -> tele_id = $requestArray['teleid'];
            $birthday = $requestArray['birthdate'];
            if ($birthday != "") {
                $user -> birth_date = $requestArray['birthdate'];
            }
            $user -> save();
            return redirect()->back()->with(['message' => $message, 'status' => $status]);
        }
    }

    public function resetAdmin()
    {
        $requestArray = request()->all();
        $id = $requestArray['id'];
        $user = User::where('id', $id)->first();

        $password = $requestArray['password'];
        $confirmpw = $requestArray['confirmpw'];
        if ($password == $confirmpw) {
            $user -> password = bcrypt($password);
            $user -> save();
            $message = "User successfully updated!";
            $status = 1;
        } else {
            $message = "Password does not match the confirm password.";
            $status = 0;
        }
        return redirect()->back()->with(['message' => $message, 'status' => $status]);
    }
	
	public function resetPwd() {
        $requestArray = request()->all();
        $user = Auth::user();

        $userPwd = $user['password'];
        $currentPwd = $requestArray['current-password'];

        if (Hash::check($currentPwd, $userPwd)) {
            $password = $requestArray['new-password'];
            $confirmpw = $requestArray['confirm-password'];
            
            if ($password == $confirmpw) {
                $user -> password = bcrypt($password);
                $user -> save();
                $message = "Pasword has been successfully updated!";
                $status = 1;
            } else {
                $message = "Password does not match the confirm password.";
                $status = 0;
            }
        } else {
            $message = "Your current password is wrong.";
            $status = 0;
        }
        return redirect()->back()->with(['message' => $message, 'status' => $status]);
    }

    public function deleteAdmin()
    {
        $requestArray = request()->all();
        $id = $requestArray['uid'];
        $user = User::where('id', $id)->delete();
        $userCom = UserCompany::where('user_id',$id)->delete();
        $companies = Company::where('user_id',$id)->get();
        foreach($companies as $company){
            $company->user_id = 1;
            $company->save();
        }
        $post = Post::where('user_id',$id)->delete();
        $candidates = Candidate::where('user_id',$id)->get();
        foreach($candidates as $candidate){
            $candidate->user_id = 1;
            $candidate->save();
        }
        $like = Like::where('user_id',$id)->delete();
        
        $this->taskSvc->removingAcc($id);
        

        if ($user = User::where('id', $id)->first()==null) {
            $message = "User successfully deleted!";
            $status = 1;
        } else {
            $message = "Failed to delete user";
            $status = 0;
        }
        return redirect()->back()->with(['message' => $message, 'status' => $status]);
    }

    public function index()
    {
        $status = "";
        $message = "";
        return Auth::user()->admin == 1 ? view('layouts.register', compact('message', 'status')): abort(403, 'Unauthorized action.');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            //user type verification
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function register(Request $data)
    {
        $status = 1;
        $message = "User successfully added";
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'admin' => $data['admin'],
                'profile_pic' => Gravatar::src($data['email'])
            ]);
            return view('layouts.register', compact('message', 'status'));
        } catch (\Illuminate\Database\QueryException $exception) {
            $status = 0;
            $message = "This user already exist";
            return view('layouts.register', compact('message', 'status'));
        }
    }

    public function promoteAdmin(){
        $requestArray = request()->all();
        $id = $requestArray['paid'];
        $message = "";
        $status = 1;
        $user = User::where('id',$id)->first();
        if($user->admin != true){
            $user->admin = true;
            $message = "User has been promoted as an admin";
            $user->save();
        }else{
            $message = "user cannot be promoted to an admin";
            $status = 0;
        }
        return redirect()->back()->with(['message' => $message, 'status' => $status]);
    }

    public function revokeAdmin(){
        $requestArray = request()->all();
        $id = $requestArray['usid'];
        $message = "";
        $status = 1;
        $user = User::where('id', $id)->first();
        if($user->admin == true){
            $message = "user admin access has been revoked";
            $user->admin = false;
            $user->save();
        }else{
            $message = "user does not have the admin access rights to be revoked";
            $status = 0;
        }
        return redirect()->back()->with(['message' => $message, 'status' => $status]);
    }
}
