<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Albums;
use App\Models\Dashboard;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function user()
    {
        $users = User::all();
        // dd($users);
        return view('admin.user', ['users' => $users]);
    }
    public function login(Request $request)
    {
        // dd($request->input());
        if (isset($_POST['user']) && isset($_POST['password'])) {
            if ($request['user'] == 'admin' && $request['password'] == 'admin') {
                return view('admin.index');
            }
            else{
                return redirect()->route('admin');
            }
        }

    }

    public function adminDashboard(){
        $dash = Dashboard::all();
        return view('admin.dashboard',['dash'=>$dash]);
    }
    public function adminAlbums($id){
        // dd($id);
        $user = User::where('id',$id)->get();
        $albums = Albums::where('user_id',$id)->get(); //find id
        return view('admin.albums', ['albums' => $albums]);
        // return redirect()->route('admin.dashboard');
    }
    
    public function adminDestroyUser($id){
        // dd($id);
        $user = User::where('id',$id);
        $user->delete();
        $user = Albums::where('user_id',$id);
        $user->delete();
        $dash = Dashboard::where('user_id',$id);
        $dash->delete();
        return redirect()->route('admin.user');
    }
}
