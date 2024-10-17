<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    // Menambahkan properti publik untuk UserModel dan KelasModel
    public $userModel;
    public $kelas;

    // Konstruktor untuk menginisialisasi properti
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelas = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengguna', // Mengganti title sesuai konteks
            'users' => $this->userModel->getUser(), // Panggil getUser dari UserModel
        ];
        return view('list_user', $data);
    }

    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profile', $data);
    }

    public function create()
    {
        // Menggunakan properti kelas dengan operator $this
        $kelas = $this->kelas->getKelas(); 
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];
        return view('create_user', $data);
    }

    public function store(Request $request)
    {
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);
        return redirect()->to('/user');
    }
}
