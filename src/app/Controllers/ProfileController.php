<?php

namespace Infoalto\Admin\Controllers;

use Infoalto\Admin\Profile;
use Infoalto\Admin\Requests\ProfileCreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
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
        $profile = auth()->user()->profile;
        if(empty($profile))
            return redirect()->route("profile.create");

        if(View::exists("admin.profile.index"))
            return View("admin.profile.index",['profile' => $profile]);

        return View("admin::admin.profile.index",['profile' => $profile]);
    }
    
    public function create(){
        if(View::exists("admin.profile.create"))
            return View("admin.profile.create");

        return View("admin::admin.profile.create");
    }
    public function store(ProfileCreateRequest $request) {
        try{
            $user = auth()->user();
            $directory_image = "storage/profiles/";
            $name_image = $user->id."-profile.".$request->file("profile_image")->extension();

            $path = $request->file('profile_image')->storeAs("profiles/", $name_image);

            $user->profile()->create($request->only('birthday','phone','about'));
            $user->profile->image()->create([
                "title" => "Imagem de perfil de $user->name",
                "directory" => $directory_image,
                "name" => $name_image
            ]);
            return redirect()->route("profile.index")->with("success","Informações atualizado com sucesso!");
        } catch(Exception $error){
            return redirect()->route("profile.index")->with("error",$error->getMessage());
        }
    }
}