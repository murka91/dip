<?php
session_start();
include 'db_connect.php';

// Проверка авторизации администратора
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: auth.php");
    exit();
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_credentials'])) {
    $current_username = $_POST['current_username'];
    $current_password = $_POST['current_password'];
    $new_username = htmlspecialchars($_POST['new_username']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Проверка текущих учетных данных
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND password = ? AND is_admin = 1");
    $stmt->bind_param("ss", $current_username, $current_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $message = "<div class='alert alert--error'>Неверные текущие логин или пароль</div>";
    } elseif ($new_password !== $confirm_password) {
        $message = "<div class='alert alert--error'>Новый пароль и подтверждение не совпадают</div>";
    } else {
        // Обновление учетных данных
        $update_stmt = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
        $update_stmt->bind_param("ssi", $new_username, $new_password, $_SESSION['user_id']);
        
        if ($update_stmt->execute()) {
            $message = "<div class='alert alert--success'>Учетные данные успешно изменены!</div>";
            // Обновляем имя пользователя в сессии
            $_SESSION['username'] = $new_username;
        } else {
            $message = "<div class='alert alert--error'>Ошибка при изменении данных: " . $update_stmt->error . "</div>";
        }
        $update_stmt->close();
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение учетных данных</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <style>
        #page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        html, body {
            margin: 0;
            padding: 0;
        }
        main.main {
            flex: 1;
        }
        body {
            font-family: Montserrat, sans-serif;
            background-color: #F8F3E6;
            color: #2C2A29;
            line-height: 1.6;
        }
        h1, h2, h3 {
            font-family: 'Montserrat Alternates', sans-serif;
            color: #A45A2A;
            margin-bottom: 1rem;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        .credentials-section {
            padding: 2rem 0;
            text-align: center;
        }
        .credentials-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .form-group {
            display: flex;
            flex-direction: column;
            text-align: left;
        }
        .form-label {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #333;
        }
        .form-input {
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            color: #444;
        }
        .form-input:focus {
            outline: none;
            border-color: #A45A2A;
            box-shadow: 0 0 5px rgba(164, 90, 42, 0.3);
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.2s ease;
            text-align: center;
        }
        .btn--primary {
            background-color: #A45A2A;
            color: #fff;
        }
        .btn--primary:hover {
            background-color: #7c4422;
        }
        .link-btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            transition: color 0.3s ease;
            margin-top: 1rem;
        }
        .link-btn--secondary {
            color: #A45A2A;
        }
        .link-btn--secondary:hover {
            color: #E1B7A1;
        }
        .alert {
            padding: 1rem;
            margin: 1rem auto;
            border-radius: 4px;
            max-width: 400px;
        }
        .alert--error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert--success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 15px;
            }
            .credentials-form {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
<div id="page-container">
    <?php include "header.php"; ?>
    
    <main class="main">
        <section class="credentials-section">
            <div class="container">
                <h1>Изменение учетных данных</h1>
                
                <?php echo $message; ?>
                
                <form method="POST" class="credentials-form">
                    <div class="form-group">
                        <label for="current_username" class="form-label">Текущий логин:</label>
                        <input type="text" id="current_username" name="current_username" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="current_password" class="form-label">Текущий пароль:</label>
                        <input type="password" id="current_password" name="current_password" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="new_username" class="form-label">Новый логин:</label>
                        <input type="text" id="new_username" name="new_username" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="new_password" class="form-label">Новый пароль:</label>
                        <input type="password" id="new_password" name="new_password" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password" class="form-label">Подтвердите пароль:</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-input" required>
                    </div>
                    
                    <button type="submit" name="change_credentials" class="btn btn--primary">Сохранить изменения</button>
                </form>
                
                <a href="admin.php" class="link-btn link-btn--secondary">Вернуться в админ-панель</a>
            </div>
        </section>
    </main>
    
    <?php include "footer.php"; ?>
</div>
</body>
</html>