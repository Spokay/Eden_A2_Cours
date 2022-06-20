<?php

namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('loginPage');
    }
    public function loginAttempt(Request $request){
        $user = $this->getUserByLoginAndPassword($request->login, $request->password);
        if ($user){
            $id = $user->id;
            $login = $user->login;
            $role_id = $user->role_id;
            Session::push('user', [
                'id'    => $id,
                'login' => $login,
                'role_id'  => $role_id
            ]);
            return redirect()->route('user.index');
        }else{
            echo 'login et/ou mot de passe invalide';
        }
    }

    public function disconnect() {
        session_destroy();
        return redirect()->back();
    }
    public function getUserByLoginAndPassword($login, $password){
//        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        return User::query()->where('login', '=', $login)->where('password', '=', $password)->getModels(['*']);
    }
}
