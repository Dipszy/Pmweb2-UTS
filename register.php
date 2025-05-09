<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>

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
            <h2>Registrasi Fasilitas Kesehatan</h2>

            <form method="POST" action="">
                <?php
                session_start();

                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    include 'Config/koneksi.php';

                    $email = $_POST['email'] ?? '';
                    $password = $_POST['password'] ?? '';
                    $confirm_password = $_POST['confirm_password'] ?? '';

                    if ($password !== $confirm_password) {
                        $error = "Kata sandi tidak cocok!";
                    } else {
                        try {
                            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
                            $stmt->execute([$email]);
                            $existing_user = $stmt->fetch();

                            if ($existing_user) {
                                $error = "Email sudah terdaftar!";
                            } else {
                                $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
                                $stmt->execute([$email, password_hash($password, PASSWORD_DEFAULT)]);

                                echo 'Registrasi berhasil! Silakan masuk.';
                                header("Location: index.php");
                                exit();
                            }
                        } catch (PDOException $e) {
                            die("Error saat registrasi: " . $e->getMessage());
                        }
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

                <label for="confirm_password">Konfirmasi Kata Sandi</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi kata sandi" required>

                <button type="submit">Daftar</button>
                <a href="index.php">Sudah punya akun? Masuk</a> <!-- Link untuk kembali ke halaman login -->
            </form>
        </div>
    </div>
</body>
</html>
