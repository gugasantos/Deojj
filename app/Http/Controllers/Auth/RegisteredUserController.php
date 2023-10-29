<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Faixa;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $tp_faixas = Faixa::all();
        #dd($tp_faixas);
        return view('auth.register',[
            'tp_faixas' => $tp_faixas
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'idade' => ['required', 'string'],
            'telefone' => ['required', 'string'],
            'endereco' => ['required', 'string']
        ]);

        if($request->hasFile('foto') && $request->file('foto')->isValid()) {

            $requestImage = $request->foto;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'idade' => $request->idade,
                'telefone' => $request->telefone,
                'endereco' => $request->endereco,
                'tp_faixa' => $request->tp_faixas,
                'grau' => $request->grau,
                'foto' => $imageName

            ]);

        }
        else{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'idade' => $request->idade,
                'telefone' => $request->telefone,
                'endereco' => $request->endereco,
                'tp_faixa' => $request->tp_faixas,
                'grau' => $request->grau,
            ]);
        }
        dd($user->id_turma);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
