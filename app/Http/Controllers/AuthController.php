<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Jurusan;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }
    
    public function postlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'Email harus di isi',
            'password.required' => 'Password harus di isi'
        ]);

        $request->session()->regenerate();
        if(Auth::attempt($credentials)){
            if(Auth::user()->role_id == 1){
                return redirect('/dashboard');
            }
            if(Auth::user()->role_id == 2){
                return redirect('/profile');
            }
        }
        return redirect('/login');
    }

     public function register()
    {
        $jurusan = Jurusan::all();

        return view('auth.register', compact('jurusan'));
    }
    
    public function simpanRegister(Request $request)
    {

        User::create([
            'role_id' => 2,
            'name' => $request->nama,
            'jurusan_id' => $request->jurusan_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'password' => bcrypt($request->password),
        ]);

        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout(); 
        return redirect('/');
    }
}