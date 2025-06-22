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
    <title>Часто задаваемые вопросы</title>
    <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Montserrat+Alternates:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #F8F3E6;
            color: #2C2A29;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        #page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: 20px;
            max-width: 800px; /* Ограничение ширины */
            margin: auto; /* Центрирование */
            
        }
        .faq{
            padding: 20px;
            background:rgb(255, 255, 255);
            border-radius: 10px;  
        }
        .section {
            padding: 20px;
            background:  #F8F3E6;
            border-radius: 10px;
            
        }

        .section__header {
            text-align: center;
            margin-bottom: 20px;
        }

        .section__title {
            margin-bottom: 0px;            
            font-size: 28px;
            font-weight: bold;
            color: #A45A2A;
            font-family: 'Montserrat Alternates', sans-serif;
        }

        .faq-item {
            border-bottom: 1px solid #E0E0E0;
            padding: 15px 0;
            cursor: pointer;
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
        }

        .faq-answer {
            display: none;
            margin-top: 10px;
            padding-left: 20px;
            text-align: left;
        }

        .arrow {
            transition: transform 0.3s ease;
            font-size: 18px; /* Уменьшение размера стрелки */
            color: #A45A2A; /* Цвет стрелки */
        }

        .faq-item.active .arrow {
            transform: rotate(90deg);
        }

        .contact-form {
            margin-top: 20px;
        }

        .contact-form input,
        .contact-form textarea {
            font-family: 'Montserrat', sans-serif;
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .contact-form button {
            width: 93%;
            font-family: 'Montserrat', sans-serif;

            padding: 10px;
            background-color: #A45A2A;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .contact-form button:hover {
            background-color: #7c4422;
        }

        .message {
            margin-top: 10px;
            color:  #A45A2A;
            text-align: center;
        }
    </style>
</head>
<body>

<?php include "header.php"; ?>

<div id="page-container">
    <div class="section">
        <div class="section__header">
            <h1 class="section__title">Часто задаваемые вопросы</h1>
        </div>
        <div class="faq">
        <div class="faq-item" onclick="toggleAnswer(this)">
            <div class="faq-question">
                 Как ухаживать за мейн-кун?
                <span class="arrow">➔</span> <!-- Минималистичная стрелка -->
            </div>
            <div class="faq-answer">
                Мейн-куны требуют регулярного ухода за шерстью, особенно в период линьки. Рекомендуется расчесывать их 2-3 раза в неделю.
            </div>
        </div>

        <div class="faq-item" onclick="toggleAnswer(this)">
            <div class="faq-question">
                 Сколько живут мейн-куны?
                <span class="arrow">

                <span class="arrow">➔</span> <!-- Минималистичная стрелка -->
            </div>
            <div class="faq-answer">
                При должном уходе мейн-куны могут жить от 12 до 15 лет, а иногда и дольше.
            </div>
        </div>

        <div class="faq-item" onclick="toggleAnswer(this)">
            <div class="faq-question">
                 Какой характер у мейн-кунов?
                <span class="arrow">➔</span> <!-- Минималистичная стрелка -->
            </div>
            <div class="faq-answer">
                Мейн-куны известны своим дружелюбным и общительным характером. Они хорошо ладят с детьми и другими животными.
            </div>
        </div>

        <div class="faq-item" onclick="toggleAnswer(this)">
            <div class="faq-question">
                 Как выбрать котенка мейн-кун?
                <span class="arrow">➔</span> <!-- Минималистичная стрелка -->
            </div>
            <div class="faq-answer">
                При выборе котенка обратите внимание на здоровье, темперамент и условия содержания. Лучше всего брать котенка от проверенных заводчиков.
            </div>
        </div>

        <div class="faq-item" onclick="toggleAnswer(this)">
            <div class="faq-question">
                 Нужны ли мейн-кунам специальные корма?
                <span class="arrow">➔</span> <!-- Минималистичная стрелка -->
            </div>
            <div class="faq-answer">
                Да, мейн-куны требуют сбалансированного питания, богатого белками и необходимыми питательными веществами.
            </div>
        </div>
        </div>


        <br>
        <div class="contact-info">
            <h2 class="section__title">Есть вопросы — спрашивайте! </h2>
            <form class="contact-form" method="POST" action="">
                <input type="text" name="name" placeholder="Ваше имя" required>
                <input type="email" name="email" placeholder="Ваш email" required>
                <textarea name="message" rows="5" placeholder="Ваше сообщение" required></textarea>
                <button type="submit">Отправить сообщение</button>
            </form>
            <?php if ($message): ?>
                <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<script>
    function toggleAnswer(faqItem) {
        const answer = faqItem.querySelector('.faq-answer');
        const arrow = faqItem.querySelector('.arrow');
        
        answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        faqItem.classList.toggle('active');
    }
</script>

<button id="backToTop" class="back-to-top" title="Наверх">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
    <path fill="currentColor" d="M12 4l-8 8h5v8h6v-8h5z"/>
  </svg>
</button>

<style>
.back-to-top {
  position: fixed;
  bottom: 30px;
  right: 30px;
  width: 50px;
  height: 50px;
  background: #A45A2A;
  color: white;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  z-index: 999;
}

.back-to-top:hover {
  background: #A45A2A;
  transform: translateY(-3px);
}

.back-to-top.visible {
  opacity: 1;
  visibility: visible;
}

.back-to-top svg {
  width: 24px;
  height: 24px;
}
</style>

<script>
// Показываем кнопку при прокрутке
window.addEventListener('scroll', function() {
  const backToTop = document.getElementById('backToTop');
  if (window.pageYOffset > 300) {
    backToTop.classList.add('visible');
  } else {
    backToTop.classList.remove('visible');
  }
});

// Плавная прокрутка вверх
document.getElementById('backToTop').addEventListener('click', function(e) {
  e.preventDefault();
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});
</script>

</body>
</html>

