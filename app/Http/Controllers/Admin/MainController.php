<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Consumer;



class MainController extends Controller
{
    public function index()
    {
        $data = [];

        $data['usersCount'] = User::all()->count();
        $data['areasCount'] = Area::all()->count();
        $data['rolesCount'] = Role::all()->count();
        $data['consumerCount'] = Consumer::all()->count();

        return view('admin.index', compact('data'));
    }
}
