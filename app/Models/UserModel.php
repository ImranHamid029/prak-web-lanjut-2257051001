<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'npm',
        'kelas_id',
        'foto',
    ];

    public function Kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function getUser($id = null)
    {
        if($id != null){
            return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
            ->select('user.*', 'kelas.nama_kelas')
            ->where('user.id',$id)
            ->first();
            
        }
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id') // Pastikan 'users.kelas_id' sesuai dengan nama kolom di tabel 'users'
        ->select('user.*', 'kelas.nama_kelas as nama_kelas') // Ambil data dari tabel users dan nama_kelas dari tabel kelas
        ->get();
    }
}
