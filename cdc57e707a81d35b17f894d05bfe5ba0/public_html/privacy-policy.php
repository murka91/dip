<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Политика конфиденциальности | Maine Coon - Питомник кошек</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Montserrat+Alternates:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

  <?php include "header.php";?>

  <!-- Основной контент страницы -->
  <section class="section" id="PrivacyPolicy">
    <div class="container">
      <div class="section__header">
        <h2 class="section__title">Политика конфиденциальности</h2>
      </div>
      
      <div class="privacy-content">
        <div class="privacy-section">
          <h3>1. Общие положения</h3>
          <p>Настоящая Политика конфиденциальности регулирует порядок обработки и использования персональных данных пользователей сайта питомника мейн кунов "Maine Coon".</p>
        </div>
        
        <div class="privacy-section">
          <h3>2. Какие данные мы собираем</h3>
          <p>Мы можем собирать следующую информацию о наших клиентах:</p>
          <ul>
            <li>ФИО, контактные данные (email, телефон)</li>
            <li>Информацию о предпочтениях в породах кошек</li>
            <li>Данные о посещении и использовании сайта</li>
            <li>Историю запросов и обращений в питомник</li>
          </ul>
        </div>
        
        <div class="privacy-section">
          <h3>3. Как мы используем данные</h3>
          <p>Собранная информация позволяет нам:</p>
          <ul>
            <li>Предоставлять информацию о котятах и услугах питомника</li>
            <li>Обрабатывать заявки на приобретение котят</li>
            <li>Улучшать качество нашего сервиса</li>
            <li>Информировать о новостях питомника (только с вашего согласия)</li>
          </ul>
        </div>
        
        <div class="privacy-section">
          <h3>4. Защита данных</h3>
          <p>Мы принимаем все необходимые меры для защиты ваших персональных данных. Доступ к ним имеют только уполномоченные сотрудники питомника.</p>
        </div>
        
        <div class="privacy-section">
          <h3>5. Использование cookies</h3>
          <p>Наш сайт использует файлы cookie для улучшения работы сервиса и анализа посещаемости. Вы можете отключить cookies в настройках браузера.</p>
        </div>
        
        <div class="privacy-section">
          <h3>6. Изменения в политике</h3>
          <p>Мы оставляем за собой право вносить изменения в настоящую Политику конфиденциальности. Актуальная версия всегда доступна на этой странице.</p>
        </div>
        
        <div class="privacy-footer">
          <p>Дата последнего обновления: <?php echo date('d.m.Y'); ?></p>
          <p>По всем вопросам обращайтесь: <a href="mailto:privacy@mainecoon.ru">privacy@mainecoon.ru</a></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Подвал сайта -->
  <?php include "footer.php";?>

  <style>
    .privacy-content {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      line-height: 1.6;
    }
    
    .privacy-section {
      margin-bottom: 30px;
    }
    
    .privacy-section h3 {
      color: #2c3e50;
      font-size: 1.2em;
      margin-bottom: 15px;
      padding-bottom: 5px;
      border-bottom: 1px solid #eee;
    }
    
    .privacy-section p, .privacy-section ul {
      margin-bottom: 15px;
    }
    
    .privacy-section ul {
      padding-left: 20px;
    }
    
    .privacy-footer {
      margin-top: 40px;
      padding-top: 20px;
      border-top: 1px solid #eee;
      font-size: 0.9em;
      color: #666;
    }
    
    @media (max-width: 768px) {
      .privacy-content {
        padding: 15px;
      }
    }
  </style>
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
  if (window.pageYOffset > 200) {
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