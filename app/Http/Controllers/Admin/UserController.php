<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Area;
use App\Models\Consumer;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consumers = Consumer::orderBy('created_at')->get();
        $users = User::orderBy('created_at')->where('email', '!=', 'greenmoroder@gmail.com')->get();
        $areas = Area::orderBy('created_at')->get();
        if (!$users->isEmpty() && !$areas->isEmpty()) {
            $readingStat = $this->statCounter($areas, $consumers, 'reading');
            $photoStat = $this->statCounter($areas, $consumers, 'photo');
            return view('admin.user.index', compact('users', 'readingStat', 'photoStat'));
        }
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::orderBy('name')->get();
        $areas = Area::pluck('name', 'id')->all();

        return view('admin.user.create', compact('roles', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]
        );

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate(['email' => $data['email']], $data);
        return redirect()->route('users.index')->withSuccessMessage('Пользователь создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::where('name', '!=', 'super-user')->get();
        $areas = Area::pluck('name', 'id')->all();
        return view('admin.user.edit', compact([
            'user',
            'roles',
            'areas'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role_id' => 'required|integer|exists:roles,id',
        ]);
        $user->update([
            'name' => $request['name']
        ]);
        $role = Role::find($request->role_id);
        $user->areas()->sync($request->areas);
        $user->syncRoles([$role->name]);
        return redirect()->route('users.index')->withSuccessMessage('Данные сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->route('users.index')->withSuccessMessage('Пользователь удален');
    }
}
