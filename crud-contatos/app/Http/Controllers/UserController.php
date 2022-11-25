<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUpdateUserFormRequest;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request) {

        $users = $this->model->getUsers(
            $request->search ?? ''
        );
        return view('users.index', compact('users'));
    }

    public function destroy($id) {

        User::findOrFail($id)->delete();
        

        return redirect()->route('user.index');
    }

    public function edit($id) {

        $user = User::findOrFail($id);

        return view('users.edit', ['user'=>$user]);

    }

    public function update(Request $request) { 


        User::findOrFail($request->id)->update($request->all());

        return redirect()->route('user.index');
    }


    public function create() {

        return view('users.create');
    }

    public function store(Request $request) {

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect()->route('user.index');

    }

    

    
}

// postaman para APIs, ajuda a simular APIs
