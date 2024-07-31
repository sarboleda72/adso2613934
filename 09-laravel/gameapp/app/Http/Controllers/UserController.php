<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user= User::All();
        $users = User::paginate(20);   
        $user = User::where('id', auth()->id())->first();
        return view('users.index')->with(['users'=> $users, 'user'=>$user]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::where('id', auth()->id())->first();
        return view('users.create')->with(['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
        //dd($request->all());

        $user = new User();
        $user->document = $request->document;
        $user->fullname = $request->fullname;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->photo = 'no-photo.png';
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if($user->save()){
            return redirect('users')->with('messages', 'The user: '. $user->fullname.'was successfully added!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //dd($user->toArray());
        $userAuth = User::where('id', auth()->id())->first();
        return view('users.show')->with(['users'=> $user, 'user'=>$userAuth]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $userAuth = User::where('id', auth()->id())->first();
        return view('users.edit')->with(['users'=>$user, 'user'=>$userAuth]); 
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        //
        if($request->hasFile('photo')){
            if($request->hasFile('photo')){
                $photo = time().'.'.$request->photo->extension();
                $request->photo->move(public_path('images'), $photo);
            }
        }else{
            $photo = 'no-photo.png';
        }

        $user->document = $request->document;
        $user->fullname = $request->fullname;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->photo = $photo;
        $user->phone = $request->phone;
        $user->email = $request->email;
        
        if($user->save()){
            return redirect('users')->with('messages', 'The user: '. $user->fullname.'was successfully update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        if($user->delete()){
            return redirect('users')->with('messages', 'The user: '. $user->fullname.'was successfully delete!');
        }

    }
}
