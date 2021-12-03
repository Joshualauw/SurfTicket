<?php

namespace App\Http\Livewire\Components;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignUp extends Component
{

    public $computedLogin;
    public $computedRegister;

    public $username;
    public $nama;
    public $email;
    public $password;
    public $confirm;

    public $loginUsername;
    public $loginPassword;

    public function mount()
    {
        $this->modalOpen = false;
        $this->computedLogin = "font-semibold text-lg";
    }

    public function setNavTab($active)
    {
        $this->computedLogin = $active === "login" ? "font-semibold text-xl" : "";
        $this->computedRegister = $active === "register" ? "font-semibold text-xl" : "";
    }

    public function resetInput()
    {
        $this->reset("username", "password", "nama", "email", "confirm", "loginPassword", "loginUsername");
    }

    public function login(Request $request)
    {
        $this->validate([
            "loginUsername" => 'required',
            "loginPassword" => 'required'
        ], [
            "loginUsername.required" => ":attribute tidak boleh kosong",
            "loginPassword.required" => ":attribute tidak boleh kosong"
        ]);

        $credentials = [
            "username" => $this->loginUsername,
            "password" => $this->loginPassword,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash("flash", [
                "title" => "Sukses!",
                "message" => "sukses login",
                "type" => "success"
            ]);
            if (Auth::user()->isAdmin) {
                return redirect()->to("/admin");
            }
            return redirect()->to('/home');
        } else {
            session()->flash("flash", [
                "title" => "Gagal!",
                "message" => "Gagal Login",
                "type" => "error"
            ]);
        }
    }

    public function register()
    {
        $this->validate([
            "username" => 'required|unique:users|min:3',
            'nama' => 'required',
            'password' => 'required|min:3',
            'confirm' => 'required|same:password',
            'email' => 'required|email',
        ], [
            'username.required' => ":attribute tidak boleh kosong",
            'username.unique' => ":attribute telah digunakan",
            "nama.required" => ":attribute tidak boleh kosong",
            "password.required" => ":attribute tidak boleh kosong",
            "password:min" => ":attribute minimal 3 karakter",
            "confirm.required" => "konfirmasi tidak boleh kosong",
            "confirm.same" => "Konfirmasi tidak sama dengan password",
            "email.required" => ":attribute tidak boleh kosong",
            "email.email" => ":attribute format tidak valid"
        ]);

        User::create([
            "username" => $this->username,
            "nama" => $this->nama,
            "password" => bcrypt($this->password),
            "email" => $this->email
        ]);
        $this->resetInput();
        session()->flash("flash", [
            "title" => "Sukses!",
            "message" => "sukses melakukan pendaftaran",
            "type" => "success"
        ]);
    }

    public function render()
    {
        return view('livewire.components.sign-up');
    }
}
