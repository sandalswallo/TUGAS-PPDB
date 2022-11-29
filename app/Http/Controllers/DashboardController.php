<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Jurusan;

class DashboardController extends Controller
{
   public function index()
   {
        $user = User::all();
        $siswa = Siswa::all();
        $jurusan = Jurusan::all();
        return view('dashboard.index', compact('user','siswa','jurusan'));
   }
}
