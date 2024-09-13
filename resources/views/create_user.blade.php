<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user.store') }}" method="POST">
        
        <div>
            <div>
                <label for="name">Nama : </label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="npm">NPM : </label>
                <input type="text" name="npm" id="npm">
            </div>
            <div>
                <label for="kelas">Kelas : </label>
                <input type="text" name="kelas" id="kelas">
            </div>
    </form>
</body>
    
</html>