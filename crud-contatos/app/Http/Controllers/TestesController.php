<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestesController extends Controller
{


    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request) {

        $uri = $request->sear;
        return dd($uri);
    }


}
