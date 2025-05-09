<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indonesia cemas</title>

    <style>
        body {
    margin: 0;
    height: 100vh;
    font-family: Arial, sans-serif;
    background: url('https://omnicare.co.id/blog/wp-content/uploads/2021/12/artikel-pilar-3.-mengelola-fasilitas-kesehatan.jpg') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
}

.sidebar-background {
    display: none;
}

.form-container {
    background-color: rgba(255, 255, 255, 0.9);
    width: 400px;
    padding: 30px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    border-radius: 8px;
}

h1 {
    font-size: 24px;
    margin: 0;
}

h2 {
    font-size: 18px;
    color: #2c3e50;
}

label {
    display: block;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #2ecc71;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #27ae60;
}

a {
    display: block;
    margin-top: 10px;
    text-align: center;
    color: #2980b9;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
    </style>

</head>
<body>
    <div class="container">
        <div class="sidebar-background"></div>
        <div class="form-container">
            <h1>Pemweb2</h1>
            <h2>Fasilitas Kesehatan</h2>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);

                echo "<p><strong>Username:</strong> $username</p>";
                echo "<p><strong>Password:</strong> $password</p>";
            }
            ?>

            <form method="POST" action="">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
                
                <label for="password">Kata sandi</label>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
                
                <button type="submit">Masuk</button>
            </form>
            <a href="#">Lupa kata sandi?</a>
        </div>
    </div>
</body>
</html>
