<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use DB;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = User::all();
        return view('users.index')->with(compact('data_user'));
    }

    public function profile()
    {
        $profile = User::all();
        return view('users.edit', compact('profile'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Dinas::all();
        return view('users.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $array = $request->validate([
            'name' => 'required', 
            'email' => 'required', 
            'level' => 'required', 
            'password' => 'required', 
            'dinas_id' => 'required', 
            'gmail' => 'required',
        ]);
        $array['password'] = bcrypt($array['password']);

        User::insert([
            'dinas_id' => $request->dinas_id,
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'gmail' => $request->gmail,
            'password' => $array['password'],
        ]);

        $request->session()->flash('message1');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $id_login = Auth::id();
        if ($id_login == $id){
            $request->session()->flash('message3');
            return redirect()->route('users.index');
        }else{
            $user = User::find($id);
            if (!$user) return redirect()->route('users.index')
                ->with('error_message', 'User dengan id' . $id . ' tidak ditemukan');
            return view('users.edit2', ['user' => $user]);
        }
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'level' => 'required',
            'password' => 'sometimes|nullable|confirmed'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        if ($request->password) $user->password = bcrypt($request->password);
        $user->save();
        $request->session()->flash('message1');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){
        $user = User::find($id);
        $id_login = Auth::id();

        if ($id == $id_login) {
            $request->session()->flash('message3');
        }
        else {
            $user->delete();
            $request->session()->flash('message2');
        }
        return redirect()->route('users.index');
    }

    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider){
        Socialite::driver('google')->stateless()->user();
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        try {
            Auth::login($authUser, true);
            return redirect()->route('home');
        } catch (\Throwable $th) {
           return redirect('/');
        }
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('gmail', $user->email)->first();
        return $authUser;
    }
}
