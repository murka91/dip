<?php
session_start();
include 'db_connect.php'; // Подключение к базе данных

// Инициализация переменных для сообщений
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $userMessage = htmlspecialchars(trim($_POST['message']));

    // Проверка на пустые поля
    if (!empty($name) && !empty($email) && !empty($userMessage)) {
        // Подготовка SQL-запроса
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $userMessage);

        // Выполнение запроса и проверка на ошибки
        if ($stmt->execute()) {
            $message = "Спасибо за ваше сообщение! Мы свяжемся с вами в ближайшее время.";
        } else {
            $message = "Ошибка при отправке сообщения. Пожалуйста, попробуйте еще раз.";
        }

        // Закрытие подготовленного выражения
        $stmt->close();
    } else {
        $message = "Пожалуйста, заполните все поля.";
    }
}

// Закрытие соединения
$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Мейн-кун: Величественная кошка</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;700&family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    </head>
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
    /* Общие стили */
    body {
        font-family: Montserrat, sans-serif;
        background-color: #F8F3E6;
        color: #2C2A29;
        margin: 0;
        padding: 0;
        line-height: 1.6;
    }

    .section__title{
        text-align: left;
        margin-bottom:0px;
    }
    /* Контейнер */
    .container-1 {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: 20px;
    }

    /* Стили для карты */
    .map {
        width: 60%;
        height: 400px;
        border: none;
        border-radius: 8px;
    }

    /* Контактная информация */
    .contact-info {
        width: 35%;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Стили для формы обратной связи */
    .contact-form {
        margin-top: 20px;
    }

    .social-icons {
    display: flex;
    gap: 10px; /* Расстояние между иконками */
}

.header__social-icon {
    width: 30px; /* Ширина иконок */
    height: auto; /* Автоматическая высота для сохранения пропорций */
}


    .contact-form input, 
    .contact-form textarea {
        width: 80%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        font-family: Montserrat, sans-serif;

    }

    .contact-form button {
        width: 100%;
        padding: 10px;
        background-color: #A45A2A;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    h3{
        color: #A45A2A;
    }

    .contact-form button:hover {
        background-color: #7c4422;
    }

    /* Адаптивный дизайн */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
            align-items: center;
        }

        .map {
            width: 100%;
            height: 300px;
        }

        .contact-info {
            width: 100%;
            margin-top: 20px;
        }
    }
</style>
<body>
<div id="page-container">
<?php include "header.php"; ?>
<main class="main">
<div class="container-1">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2291.128353495531!2d73.38411547706896!3d54.95330917279886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43aafdf4dd8ea705%3A0x82c252a0d79f1ae2!2z0JrQsNGA0LvQsCDQnNCw0YDQutGB0LAg0L_RgNC-0YHQvy4sIDQwLCDQntC80YHQuiwg0J7QvNGB0LrQsNGPINC-0LHQuy4sIDY0NDA0OA!5e0!3m2!1sru!2sru!4v1742286963466!5m2!1sru!2sru" width="900" height="770" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
    <div class="contact-info">
        <h2 class="section__title">Контактная информация</h2>        
        <h3>Наши контакты</h3>
        <p><strong>Адрес:</strong> Проспект Карла Маркса, 40, г. Омск, Россия</p>
        <p><strong>Телефон:</strong> +7-(900)-787-23-21</p>
        <p><strong>Email:</strong> DomSapfiroff@mail.ru</p>
        
        <h3>Социальные сети</h3>
    <div class="social-icons">
        <a href="#" class="header__social">
            <img src="images/vk.svg" alt="ВКонтакте" class="header__social-icon">
        </a>
        <a href="#" class="header__social">
            <img src="images/whatsapp.svg" alt="WhatsApp" class="header__social-icon">
        </a>
        <!-- Добавьте дополнительные иконки, если нужно -->
    </div>
    <p>Если у вас есть вопросы, не стесняйтесь обращаться!</p>

        <form class="contact-form" method="POST" action="">
            <input type="text" name="name" placeholder="Ваше имя" required>
            <input type="email" name="email" placeholder="Ваш email" required>
            <textarea name="message" rows="5" placeholder="Ваше сообщение" required></textarea>
            <button type="submit">Отправить сообщение</button>
        </form>
        
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</div>
<br>
</main>
<?php include "footer.php"; ?>
</div>
</body>

</html>
