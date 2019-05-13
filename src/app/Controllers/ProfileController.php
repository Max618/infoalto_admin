<?php

namespace Infoalto\Admin\Controllers;

use Infoalto\Admin\Profile;
use Infoalto\Admin\Requests\ProfileCreateRequest;
use Infoalto\Admin\Requests\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    private $directory_image;
    public function __construct()
    {
        $this->middleware('auth');
        $this->directory_image = "storage/profiles/";
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
            $user->profile()->create($request->only('birthday','phone','about'));

            $name_image = $user->id."-profile.".$request->file("profile_image")->extension();
            
            $user->profile->image()->create([
                "name" => $name_image,
                "title" => "Imagem de perfil de $user->name",
                "directory" => $this->directory_image,
            ]);
            $user->profile->image->uploadImage($request->file('profile_image'),$name_image,'profiles/', $request->file("profile_image")->extension());
            return redirect()->route("profile.index")->with("success","Perfil criado com sucesso!");
        } catch(Exception $error){
            return redirect()->route("profile.index")->with("error",$error->getMessage());
        }
    }

    public function edit(){
        $profile = auth()->user()->profile;
        if(View::exists("admin.profile.edit"))
            return View("admin.profile.edit", ['profile' => $profile]);

        return View("admin::admin.profile.edit", ['profile' => $profile]);
    }

    public function update(ProfileUpdateRequest $request) {
        try {
            $profile = auth()->user()->profile;
            $profile->fill($request->only('name','birthday','phone','about'));
            if($request->hasFile('profile_image')){
                $name_image = auth()->id()."-profile.".$request->file("profile_image")->extension();
                $profile->image->name = $name_image;
                $profile->image->uploadImage($request->file('profile_image'),$name_image,'profiles/', $request->file("profile_image")->extension());
                $profile->image->save();
            }
            $profile->save();
            return redirect()->route("profile.index")->with("success","Perfil atualizado com sucesso!");
        } catch(Exception $error){
            return redirect()->route("profile.index")->with("error",$error->getMessage());
        }
    }
}