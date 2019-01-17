<?php

namespace Infoalto\Admin\Controllers;

use Infoalto\Admin\Profile;
use Illuminate\Http\Request;
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

        if(View::exists("admin.profile.index"))
            return View("admin.profile.index",['profile' => $profile]);

        return View("admin::admin.profile.index",['profile' => $profile]);
    }
}