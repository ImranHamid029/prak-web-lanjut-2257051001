<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Profil</title>
    <style>
    
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #74ebd5, #ACB6E5);
}

.profile-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.profile-card {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    padding: 20px;
    text-align: center;
    width:500px;
}

.profile-avatar img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 5px solid #74ebd5;
    margin-bottom: 20px;
}

.profile-info {
    color: #333;
}

.profile-name {
    background-color: #f5f5f5;
    padding: 10px;
    border-radius: 10px;
}
.profile-name:hover, .profile-class:hover, .profile-npm:hover{
    background: linear-gradient(135deg, #74ebd5, #ACB6E5)
}
.profile-class, .profile-npm, .profile-name  {
    font-size: 18px;
    margin-bottom: 5px;
}

.profile-class {
    background-color: #f5f5f5;
    padding: 10px;
    border-radius: 10px;
}

.profile-npm {
    background-color: #f5f5f5;
    padding: 10px;
    border-radius: 10px;
}


.profile-card:hover {
    transform: translateY(-5px);
    transition: 0.3s;
}

.profile-avatar img:hover {
    border-color: #ACB6E5;
    transition: 0.3s;
}

    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-avatar">
            <img src="{{ asset('assets/img/Profile_Hamid.png') }}" alt="Profile">
            </div>
            <div class="profile-info">
                <p class="profile-name">Nama : <br>{{ $nama }}</p>
                <p class="profile-class">NPM: <br>{{ $npm }}</p>
                <p class="profile-npm">Kelas: <br>{{$nama_kelas ?? 'Kelas Tidak ditemukan'}}</p>
            </div>
        </div>
    </div>
</body>
</html>
