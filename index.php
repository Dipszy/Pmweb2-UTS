<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
        <div class="form-container">
            <h1>Pemweb2</h1>
            <h2>Masuk ke Fasilitas Kesehatan</h2>

            <form method="POST" action="">
                <?php
                session_start();

                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    include 'Config/koneksi.php';

                    $email = $_POST['email'] ?? '';
                    $password = $_POST['password'] ?? '';

                    try {
                        $stmt = $pdo->prepare("SELECT id, email, password FROM users WHERE email = ?");
                        $stmt->execute([$email]);
                        $user = $stmt->fetch();

                        if ($user) {
                            if (password_verify($password, $user['password'])) {
                                $_SESSION['user_id'] = $user['id'];
                                $_SESSION['email'] = $user['email'];

                                header("Location: root.php");
                                exit();
                            } else {
                                $error = "Password salah!";
                            }
                        } else {
                            $error = "Email tidak terdaftar!";
                        }
                    } catch (PDOException $e) {
                        die("Error saat login: " . $e->getMessage());
                    }
                }
                ?>

                <?php if (isset($error)): ?>
                    <div style="color: red; margin-bottom: 10px;"><?php echo $error; ?></div>
                <?php endif; ?>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" required>

                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>

                <button type="submit">Masuk</button>
                <a href="register.php">Daftar</a> <!-- Link untuk pindah ke halaman registrasi -->
            </form>
        </div>
    </div>
</body>
</html>
