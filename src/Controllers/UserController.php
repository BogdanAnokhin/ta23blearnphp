<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function __construct()
    {
        if(!auth()){
            redirect('/login');
            die;
        }
    }

    public function index()
    {
        $users = User::all();
        view('users/index', compact('users'));
    }

    public function create() {
        view('users/create');
    }

    public function store() {
        if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['name'])) {
            redirect('/users/create');
            return;
        }

        $existingUser = User::where('email', $_POST['email']);
        if(!empty($existingUser)) {
            redirect('/users/create');
            return;
        }

        $user = new User();
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user->save();
        redirect('/users');
    }

    public function edit() {
        $user = User::find($_GET['id']);
        view('users/edit', compact('user'));
    }

    public function update() {
        $user = User::find($_GET['id']);
        
        if(empty($_POST['email']) || empty($_POST['name'])) {
            redirect('/users/edit?id=' . $user->id);
            return;
        }

        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        
        if(!empty($_POST['password'])) {
            $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        }
        
        $user->save();
        redirect('/users');
    }

    public function destroy() {
        $user = User::find($_GET['id']);
        $user->delete();
        redirect('/users');
    }
}