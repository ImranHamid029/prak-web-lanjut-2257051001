<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
class UserController extends Controller
{
    public function profile($nama ="", $kelas ="", $npm ="")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
           ];
           return view('profile', $data);
    }
    
    public function create(){
        return view('create_user', [
            'kelas' => Kelas::all(), // Kelas dengan huruf kapital
        ]);
       }

       public function store(Request $request)
       {
           // Validasi input
           $validatedData = $request->validate([
               'nama' => 'required|string|max:255',
               'npm' => 'required|string|max:255',
               'kelas_id' => 'required|exists:kelas,id', // Memastikan kelas_id valid
           ]);
           $user = UserModel::create($validatedData);
           $user->load('kelas');
   
           return view('profile',[
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'kelas tidak di temukan',
           ]);
       }
}
