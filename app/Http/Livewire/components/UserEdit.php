<?php

namespace App\Http\Livewire\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserEdit extends Component
{
    public $userId;
    public $username;
    public $nama;
    public $email;
    public $img_dir;
    public $alamat;
    public $no_telp;
    public $tanggal_lahir;

    public function mount()
    {
        $user = Auth::user();
        $this->userId = $user->id;
        $this->username = $user->username;
        $this->nama = $user->nama;
        $this->img_dir = $user->img_dir;
        $this->email = $user->email;
        $this->no_telp = $user->no_telp;
        $this->tanggal_lahir = $user->tanggal_lahir;
    }

    public function updateUserData()
    {
        $this->validate([
            "username" => 'required|min:3|unique:users,username,' . $this->userId,
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userId,
        ], [
            'username.required' => ":attribute tidak boleh kosong",
            'username.unique' => ":attribute telah digunakan",
            "nama.required" => ":attribute tidak boleh kosong",
            "password.required" => ":attribute tidak boleh kosong",
            "password:min" => ":attribute minimal 3 karakter",
            "confirm.required" => "konfirmasi tidak boleh kosong",
            "confirm.same" => "Konfirmasi tidak sama dengan password",
            "email.unique" => ":attribute telah digunakan",
            "email.required" => ":attribute tidak boleh kosong",
            "email.email" => ":attribute format tidak valid"
        ]);

        User::find($this->userId)->update([
            "username" => $this->username,
            "nama" => $this->nama,
            "email" => $this->email,
            "alamat" => $this->alamat,
            "tanggal_lahir" => $this->tanggal_lahir,
            "no_telp" => $this->no_telp
        ]);

        session()->flash("flash", [
            "title" => "Sukses!",
            "message" => "Sukses Update Data",
            "type" => "success"
        ]);
    }

    public function render()
    {
        return view('livewire.components.user-edit');
    }
}
