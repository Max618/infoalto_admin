<?php

namespace Infoalto\Admin\Controllers;

use Infoalto\Admin\User;
use Infoalto\Admin\Role;
use Infoalto\Admin\Requests\UserCreateRequest;
use Infoalto\Admin\Requests\UserUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;

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
        $this->authorize('user_view');

        $users = User::all();
        if(View::exists("admin.user.index"))
            return View("admin.user.index",['users' => $users]);

        return View("admin::admin.user.index",['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('user_create');

        $roles = Role::all()->pluck('name','id');
        
        if(View::exists("admin.user.create"))
            return View("admin.user.create",["roles" => $roles]);

        return View("admin::admin.user.create",["roles" => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $this->authorize('user_create');

        try{
            $user = User::create($request->only('name','email','password'));
            $user->password = Hash::make($user->password);
            $user->roles()->attach($request->get("role_id"));
            $user->save();
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
        $this->authorize('user_view');

        if(View::exists("admin.user.show"))
            return View("admin.user.show", ['user' => $user]);

        return View("admin::admin.user.show",['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('user_edit');

        $roles = Role::all()->pluck('name','id');

        if(View::exists("admin.user.edit"))
            return View("admin.user.edit", ['user' => $user,"roles" => $roles]);
        
        return View("admin::admin.user.edit",['user' => $user,"roles" => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $this->authorize('user_edit');

        try{
            $user->fill($request->only('name','email'));
            $user->roles()->sync($request->only("role_id"));
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
        $this->authorize('user_delete');

        try{
            $user->delete();
            return redirect()->route('user.index')->with('success','Usuário deletado com sucesso!');
        }catch(Exception $error){
            return redirect()->route('user.index')->with('error',$error->getMessage());
        }
    }
}