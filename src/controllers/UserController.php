<?php

namespace Infoalto\Admin\Controllers;

use Infoalto\Admin\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return View("admin.user.index",['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            User::create($request->only('name','email','password'));
            return redirect()->route("user.index")->with("success","Usuário criado com sucesso!");
        } catch(Exception $error){
            return redirect()->route("user.index")->with("error",$error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return View("admin.user.show",['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return View("admin.user.edit",['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try{
            $user->fill($request->only('name','email'));
            $user->save();
            return redirect()->route("user.index")->with("success","Usuário atualizado com sucesso!");
        } catch(Exception $error){
            return redirect()->route("user.index")->with("error",$error->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try{
            $user->delete();
            return redirect()->route('user.index')->with('success','Usuário deletado com sucesso!');
        }catch(Exception $error){
            return redirect()->route('user.index')->with('error',$error->getMessage());
        }
    }

    public function teste(){
        dd(Auth::user());
    }
}