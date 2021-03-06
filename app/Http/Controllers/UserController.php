<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$data['title']="List of Users";
    $data['table']=User::paginate(4);
    $data['serial']=($data['table']->currentPage()!=1)?($data['table']->perPage()*($data['table']->currentPage()-1))+1:1;
    return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$data['title']="Create New User";
     return view('admin.user.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',

            'email'=>'required|email|unique:users',

            'phone'=>'required|unique:users',

            'password'=>'required|min:6|confirmed',
        ]);
        $data=$request->all();
        $data['password']=Hash::make($data['password']);
            User::create($data);
            session()->flash('message','User Created Successfully');
            return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['title']="Update User";
        $data['user']=$user;

        return view('admin.user.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'name'=>'required',

            'email'=>'required|email|unique:users,email,'.$user->id,


            'phone'=>'required|unique:users,phone,'.$user->id,
        ]);


        $user -> update($request->all());
        session()->flash('message','User Updated Successfully');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('error','User deleted Successfully');
        return redirect()->route('user.index');
    }
}
