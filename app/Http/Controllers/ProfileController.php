<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function getInfos()
    {
        return view('profile', ['user'=>Auth::user()]);
    }
    public function editInfo()
    {
        $u = User::findorFail(Auth::user()->id);
        $u->email = $_POST['email'];
        $u->name = $_POST['name'];
        $u->save();
        return $this->success('Profile Updated Successfully');
    }

    public function editPass()
    {

    }

    public function getReport()
    {

    }

    private function success(string $str)
    {
        return redirect('/profile')->with(['success'=>$str]);
    }
}
