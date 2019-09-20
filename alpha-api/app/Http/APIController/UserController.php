<?php

namespace App\Http\APIController;

use App\AlphaFramework\CommonHelper;
use App\AlphaFramework\PusherEvent;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $apiToken;
    public function __construct()
    {
        $this->apiToken = uniqid(base64_encode(str_random(60)));
    }
    public function UserList()
    {
        //return event(new PusherEvent(["event" => "logout"],""));
        return User::get();
    }

    public function UserById($Id)
    {
        return User::with(["user_role"])->where("id", $Id)->get();
    }

    public function UserInsert(Request $request)
    {
        try {
            $user = new User();
            $user = $request->only($user->fillable);
            $user["password"] = Crypt::encrypt($user["password"]);;
            $result = User::create($user);
            return response(["Type" => "S", "Message" => "User inserted successfully", "AdditionalData" => [], "Id" => $result["id"]]);
        } catch (QueryException $exception) {
            return response(["Type" => "E", "Message" => $exception->errorInfo[2]]);
        }
    }
    public function UserUpdate(Request $request, $id)
    {
        try {
            $user = new User();
            User::where("id", $id)->update($request->only($user->fillable));
            return response(["Type" => "S", "Message" => "User updated successfully"]);
        } catch (QueryException $exception) {
            return response(["Type" => "E", "Message" => $exception->errorInfo[2]]);
        }
    }
    public function PasswordDecrypt($password)
    {
        return  Crypt::decrypt($password);
    }

    public function Login(Request $request)
    {
        $data = User::where("user_name", $request["user_name"])->first();
        if (!empty($data)) {
            if (Crypt::decrypt($data->password) == $request["password"]) {
                DB::table('user')
                    ->where('id', $data->id)
                    ->update(["api_token" => $this->apiToken]);
                $data->api_token = $this->apiToken;
                $resultdate = [
                    "User" => $data,
                ];
                Auth::login($data);
                return response(["Type" => "S", "Message" => "Login successfully", "AdditionalData" => $resultdate]);
            } else {
                return response(["Type" => "E", "Message" => "Invalid password", "AdditionalData" => "", "AdditionalDate" => ""]);
            }
        } else {
            return response(["Type" => "E", "Message" => "Invalid user name", "AdditionalData" => "", "AdditionalDate" => ""]);
        }
    }
}
