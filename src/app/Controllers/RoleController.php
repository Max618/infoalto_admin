<?php

namespace Infoalto\Admin\Controllers;

use Infoalto\Admin\Role;
use Infoalto\Admin\Permission;
use Infoalto\Admin\Requests\RoleCreateRequest;
use Infoalto\Admin\Requests\RoleUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class RoleController extends Controller
{
    private $options;
    private $modelNames;
    public function __construct()
    {
        $this->middleware('auth');
        $this->options = ['create','edit','view','delete'];
        $this->modelNames = \Infoalto\Admin\Helpers::getModels();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('role_view');

        $roles = Role::all();
        if(View::exists("admin.role.index"))
            return View("admin.role.index",['roles' => $roles]);

        return View("admin::admin.role.index",['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('role_create');

        if(View::exists("admin.role.create"))
            return View("admin.role.create", ['modelNames' => $this->modelNames, 'options' => $this->options]);

        return View("admin::admin.role.create", ['modelNames' => $this->modelNames, 'options' => $this->options]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        $this->authorize('role_create');


        try{
            $role = Role::create($request->only('name','description'));

            //tratar request permissions e criar
            $options = collect($request->get('options'));
            $model = collect($request->get('model'));
            $role->attach_permissions($options, $model);
            
            return redirect()->route("role.index")->with("success","Função criado com sucesso!");
        } catch(Exception $error){
            return redirect()->route("role.index")->with("error",$error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('role_view');

        if(View::exists("admin.role.show"))
            return View("admin.role.show",["role" => $role]);
        
        return View("admin::admin.role.show",["role" => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('role_edit');
        $rolePermissions = collect(explode("/",$role->permissions));
        $modelPermissions = $rolePermissions->map(function ($item) {
            return explode("_",$item);
        });

        if(View::exists("admin.role.edit"))
            return View("admin.role.edit",["role" => $role,'modelNames' => $this->modelNames, 'options' => $this->options,'rolePermissions' => $rolePermissions,'modelPermissions' => $modelPermissions]);

        return View("admin::admin.role.edit",["role" => $role,'modelNames' => $this->modelNames, 'options' => $this->options, 'rolePermissions' => $rolePermissions, 'modelPermissions' => $modelPermissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $Role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $this->authorize('role_edit');

        try{
            $role->fill($request->only('name','description'));
            $role->permissions()->detach();
            //tratar request permissions e criar
            $options = collect($request->get('options'));
            $model = collect($request->get('model'));
            $role->attach_permissions($options, $model);
            $role->save();
            return redirect()->route("role.index")->with("success","Função atualizada com sucesso!");
        } catch(Exception $error){
            return redirect()->route("role.index")->with("error",$error->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('role_delete');

        try{
            $role->delete();
            return redirect()->route('role.index')->with('success','Função deletada com sucesso!');
        }catch(Exception $error){
            return redirect()->route('role.index')->with('error',$error->getMessage());
        }
    }
}