<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use DB;


class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etudiant = DB::table('etudiants')->where('email', $request->email)->count();
      
        if ($etudiant > 0) {

            $request->validate([
                        'name' => 'required|unique:users',
                        'email' => 'required|email|unique:users',
                        'password' => 'required|min:6|max:20'
                    ]);
        
                    $user = new User;
                    $user->fill($request->all());
                    $user->password = Hash::make($request->password);
                    $user->save();
        
                    return redirect(route('login'))->withSuccess('hi, everything is oki !');
        }
        else {
            
            $locale = config('app.locale');
            if($locale == 'fr') {
                
                $locale = 'Desolé ce courriel n\'existe pas dans notre base';
            }else {

                $locale = 'Sorry this email does not exist in our database';
            }
            return redirect()->back()->withErrors($locale);
         }

    }


    public function authentification (Request $request) {

      
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)): 
            return redirect('login')->withErrors(["Le nom d'utilisateur ou mot de passe et incorrect"]);
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        
        Auth::login($user, $request->get('remember'));
        
        if($user->id === 1) {
            Session::put('user_privilege' , 'admin');
        };
        
        return redirect(route('liste.article'));


    } 

    

    public function logout(){

        Session::flush();
        Auth::logout();
        return redirect(route('login'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
