<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\model_has_permissions;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Permission;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    
    public function index()
    {
        
        $users = User::orderBy('name', 'ASC')->paginate(5);

        return view('adminmanager.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
     public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),            
        ])->givePermissionTo('user');


        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        $permissions = Permission::all();
        
        return view('adminmanager.edit', compact('users', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        
        $user = User::findOrFail($id);
        $user->syncPermissions($request->permission_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('adminmanager.index')->with('success', 'Usuário atualizada com sucesso!');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('adminmanager.index')->with('success', 'Usuário excluido com sucesso!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        $user->save();

        return view('adminmanager.show', compact('user'));
    }

    
}
