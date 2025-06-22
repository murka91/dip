<?php
ob_start();
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $sql_check = "SELECT id FROM users WHERE username = ?";
    $stmt_check = $conn->prepare($sql_check);

    if ($stmt_check === false) {
        die("Ошибка подготовки запроса: " . $conn->error);
    }

    $stmt_check->bind_param("s", $username);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        $error = "Пользователь с таким именем уже существует.";
    } else {
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Ошибка подготовки запроса: " . $conn->error);
        }

        $stmt->bind_param("sss", $username, $password, $email);

        if ($stmt->execute()) {
            $sql_auth = "SELECT id, username FROM users WHERE username = ? AND password = ?";
            $stmt_auth = $conn->prepare($sql_auth);
            
            if ($stmt_auth === false) {
                die("Ошибка подготовки запроса авторизации: " . $conn->error);
            }
            
            $stmt_auth->bind_param("ss", $username, $password);
            $stmt_auth->execute();
            $result_auth = $stmt_auth->get_result();

            if ($result_auth->num_rows == 1) {
                $row = $result_auth->fetch_assoc();
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                
                ob_end_clean();
                header("Location: profile.php");
                exit();
            } else {
                ob_end_clean();
                header("Location: auth.php?reg_success=1");
                exit();
            }
        } else {
            $error = "Ошибка регистрации: " . $stmt->error;
        }
        $stmt->close();
    }
    $stmt_check->close();
}

$conn->close();
ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <style>
             #page-container {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Высота вьюпорта */
}
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}
main.main {
    flex: 1; /* Занимает всё доступное пространство */
}
    /* Общие стили (уже были, но для полноты) */
    body {
        font-family: Montserrat, sans-serif;
        background-color: #F8F3E6;
        color: #2C2A29;
        margin: 0;
        padding: 0;
        line-height: 1.6; /* Добавлено для лучшей читаемости текста */
    }

    /* Заголовки */
    h1, h2, h3 {
        font-family: 'Montserrat Alternates', sans-serif;
        color: #A45A2A;
        margin-bottom: 1rem;
    }

    /* Main section стили */
    .main {
        padding: 2rem 0;
    }

    /* Стили для секции регистрации */
    .auth-section {
        padding: 2rem 0;
        text-align: center; /* Центрирование содержимого */
    }

    .auth-section__title {
        font-size: 2rem;
        margin-bottom: 1.5rem;
    }

    .auth-section__register-link {
        margin-top: 1.5rem;
        font-size: 1rem;
        color: #555;
    }

    /* Стили для формы авторизации */
    .auth-form {
        display: flex;
        flex-direction: column; /* Вертикальное расположение элементов */
        gap: 1rem; /* Отступы между элементами формы */
        width: 100%;
        max-width: 400px; /* Ограничение ширины формы */
        margin: 0 auto; /* Центрирование формы */
    }

    .auth-form__group {
        display: flex;
        flex-direction: column;
        text-align: left;
    }

    .auth-form__label {
        font-size: 1rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: #333;
    }

    .auth-form__input {
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
        color: #444;
    }

    .auth-form__input:focus {
        outline: none;
        border-color: #A45A2A;
        box-shadow: 0 0 5px rgba(164, 90, 42, 0.3);
    }

    /* Общие стили кнопок */
    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.2s ease;
        text-decoration: none; /* Убрать подчеркивание, если это ссылка */
        display: inline-block; /* Чтобы работали width и height, если это ссылка */
        text-align: center;
    }

    .btn--primary {
        background-color: #A45A2A;
        color: #fff;
    }

    .btn--primary:hover {
        background-color: #7c4422;
    }

    /* Стили ссылок как кнопок */
    .link-btn {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.2s ease, color 0.2s ease;
        font-size: 1rem;
    }

    .link-btn--secondary {
        color: #A45A2A;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .link-btn--secondary:hover {
        text-decoration:none; /* Подчеркивание при наведении */
        color: #E1B7A1; /* Цвет при наведении */
    }

    /* Стили для сообщений об ошибках */
    .alert {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 4px;
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

    /* Адаптивный дизайн (медиа-запросы) */
    @media (max-width: 768px) {
        .container {
            width: 95%;
            padding: 15px;
        }

        .auth-form {
            max-width: 100%;
        }
    }
    .cat-ball {
        font-size: 2rem;
    }
    /* Стили для чекбокса */
.checkbox-container {
  display: block;
  position: relative;
  padding-left: 30px;
  cursor: pointer;
  user-select: none;
  font-size: 14px;
  color: #333;
}

.custom-checkbox {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 18px;
  width: 18px;
  background-color: #fff;
  border: 2px solid #ccc;
  border-radius: 4px;
  transition: all 0.2s;
}

.checkbox-container:hover .custom-checkbox ~ .checkmark {
  border-color: #888;
}

.custom-checkbox:checked ~ .checkmark {
  background-color: #A45A2A;
  border-color: #A45A2A;
}

.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.custom-checkbox:checked ~ .checkmark:after {
  display: block;
}

.checkmark:after {
  left: 5px;
  top: 1px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}

/* Стиль ссылки на политику */
.privacy-policy a {
  color: #A45A2A;
  text-decoration: none;
}

.privacy-policy a:hover {
  text-decoration: underline;
}

/* Сообщение об ошибке */
.error-message {
  color: #d32f2f;
  font-size: 13px;
  margin-top: 5px;
  margin-left: 30px;
}
 .privacy-error {
            color: #ff0000;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
        .checkbox-highlight {
            animation: highlight 0.5s;
        }
        @keyframes highlight {
            0% { background-color: #ffcccc; }
            100% { background-color: transparent; }
        }
    </style>
</head>
<body>
<div id="page-container">
<?php include "header.php";?>

    <main class="main">
        <section class="auth-section">
            <h1 class="auth-section__title">Регистрация</h1>
            <?php if ($error != "") { echo "<div class='alert alert--error'>$error</div>"; } ?>
            <form method="post" action="register.php" class="auth-form" id="registerForm" onsubmit="return validateForm()">
                <div class="auth-form__group">
                    <label for="username" class="auth-form__label">Имя пользователя:</label>
                    <input type="text" id="username" name="username" class="auth-form__input" required>
                </div>

                <div class="auth-form__group">
                    <label for="password" class="auth-form__label">Пароль:</label>
                    <input type="password" id="password" name="password" class="auth-form__input" required>
                </div>

                <div class="auth-form__group">
                    <label for="email" class="auth-form__label">Email:</label>
                    <input type="email" id="email" name="email" class="auth-form__input" required>
                </div>

                <div class="privacy-policy">
            <label class="checkbox-container" id="privacyLabel">
                <input type="checkbox" id="privacyCheckbox" class="custom-checkbox">
                <span class="checkmark"></span>
                Я согласен(а) с <a href="privacy-policy.php" target="_blank">политикой конфиденциальности</a>
            </label>
            <div class="error-message" id="privacyError">
                <span style="color:#d32f2f;">⚠</span> Пожалуйста, отметьте это поле
            </div>
        </div>


                <button type="submit" class="btn btn--primary">Зарегистрироваться</button>
            </form>
            <a href="auth.php" class="link-btn link-btn--secondary">Уже есть аккаунт?</a>
        </section>
    </main>
    <?php include "footer.php"; ?>
</div>

<script>
function validateForm() {
    const checkbox = document.getElementById('privacyCheckbox');
    const errorMsg = document.getElementById('privacyError');
    const label = document.getElementById('privacyLabel');
    
    if (!checkbox.checked) {
        // Показываем ошибку
        errorMsg.style.display = 'block';
        label.classList.add('checkbox-highlight');
        
        // Через 0.5s убираем анимацию
        setTimeout(() => {
            label.classList.remove('checkbox-highlight');
        }, 500);
        
        return false; // Отменяем отправку формы
    }
    return true; // Разрешаем отправку формы
}

// Скрываем сообщение при клике на чекбокс
document.getElementById('privacyCheckbox').addEventListener('click', function() {
    if (this.checked) {
        document.getElementById('privacyError').style.display = 'none';
    }
});
</script>
</body>
</html>
