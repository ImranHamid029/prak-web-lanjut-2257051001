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

    public function profile($id)
    {
        $user = $this->userModel->find($id); // Ambil pengguna berdasarkan ID

    // Pastikan bahwa pengguna ditemukan
    if (!$user) {
        return redirect()->route('user.index')->with('error', 'Pengguna tidak ditemukan.');
    }

    $data = [
        'user' => $user, // Kirim instance pengguna ke tampilan
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
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            // Menyimpan file foto di folder 'uploads'
            $fotoPath = $foto->move(('upload/img'), $foto);
            } 
            else {
                $fotoPath = null;
            }
            $this->userModel->create([
                'nama' => $request->input('nama'),
                'npm' => $request->input('npm'),
                'kelas_id' => $request->input('kelas_id'),
                'foto' => $fotoPath, // Menyimpan path foto
                ]);
                return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }
    public function show($id){
        $user = $this->userModel->getUser($id);
        $data = [
            'title' => 'profile',
            'user' => $user,
        ];
        return view('profile',$data);
    }
}
