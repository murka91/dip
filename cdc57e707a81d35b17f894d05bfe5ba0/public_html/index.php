<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maine Coon - Питомник кошек</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Montserrat+Alternates:wght@400;700&display=swap" rel="stylesheet">
  </head>

<body>

  <?php include "header.php";?>

  <?php include "carousel.php";?>

  <!-- Добро пожаловать -->
  <section class="section" id="AboutUs">
    <div class="container">
      <div class="section__header">
        <h2 class="section__title">Добро пожаловать в наш питомник мейн кунов!</h2>
      </div>
    </div>
    <img src="images/welcome.jpg" alt="Мейн-кун котята" class="section__image">
    <div class="container">
      <div class="section__text">
        <p>Здесь вы найдете не только удивительных котят, но и настоящих членов семьи, которые принесут радость и любовь в ваш дом. Мы гордимся тем, что можем предложить вам здоровых, счастливых и социализированных мейн кунов, которые станут вашими верными спутниками на долгие годы!Чтобы перейти к просмотру всех котят и узнать о них подробнее, нажмите эту кнопку: </p>
      </div>
      <a href="kittens.php" class="button">Смотреть котят</a>
    </div>
  </section>

  <!-- Свободные котята -->
  <section class="section" id="Kittens">
    <div class="container">
      <div class="section__header">
        <h2 class="section__title">Наши котята готовы к переезду в новый дом</h2>
      </div>
      <div class="kittens__list">
        <div class="kitten__item">
          <img src="images\(1).jpg" alt="Котёнок 1" class="kitten__image">
          <h3 class="kitten__name">Барсик</h3>
          <p class="kitten__description">Окрас: красный мрамор, возраст: 2 месяца</p>
        </div>
        <div class="kitten__item">
          <img src="images\(2).jpg" alt="Котёнок 2" class="kitten__image">
          <h3 class="kitten__name">Муся</h3>
          <p class="kitten__description">Окрас: черепаховый, возраст: 3 месяца</p>
        </div>
        <div class="kitten__item">
          <img src="images\(3).jpg" alt="Котёнок 3" class="kitten__image">
          <h3 class="kitten__name">Лео</h3>
          <p class="kitten__description">Окрас: черный дым, возраст: 2.5 месяца</p>
        </div>
      </div>
      <a href="kittens.php" class="button">Смотреть всех котят</a>
    </div>
  </section>

  <!-- О породе -->
  <section class="section" id="Breed">
    <div class="container">
      <div class="section__header">
        <h2 class="section__title">Всё о породе мейн-кун</h2>
      </div>
      <img src="images/breed.png" alt="Мейн-кун" class="section__image">
      <div class="section__text">
        <p>Мейн-кун – это крупная, ласковая и умная кошка, которая станет отличным другом для всей семьи. Эти кошки отличаются высоким интеллектом и дружелюбным характером.</p>
      </div>
      <a href="breed.php" class="button">Узнать больше о породе</a>
    </div>
  </section>

  <!-- Новости -->
  <section class="section" id="News">
  <div class="container">
    <div class="section__header">
      <h2 class="section__title">Новости питомника</h2>
    </div>
    <div class="news__list">
      <div class="news__item">
        <h3 class="news__title">Новый помёт котят!</h3>
        <p class="news__date">10.04.2025</p>
        <img src="images/v1.jpg" alt="Новый помёт котят" class="news__image">
        <p class="news__description">В нашем питомнике пополнение! Родились замечательные котята мейн-кун.</p>
      </div>
      <div class="news__item">
        <h3 class="news__title">Участие в выставке</h3>
        <p class="news__date">05.04.2025</p>
        <img src="images/v2.jpg" alt="Участие в выставке" class="news__image">
        <p class="news__description">Наши кошки приняли участие в международной выставке кошек и получили высокие оценки!</p>
      </div>
      <div class="news__item">
        <h3 class="news__title">Новый питомец в нашем доме</h3>
        <p class="news__date">31.03.2025</p>
        <img src="images/v3.jpg" alt="Новый питомец" class="news__image">
        <p class="news__description">Мы рады представить нашего нового питомца - очаровательного щенка лабрадора!</p>
      </div>
    </div>
    <a href="https://vk.com/dom_sapfiroff?from=search" class="button">СМОТРЕТЬ ВСЕ НОВОСТИ</a>
  </div>
</section>



  <!-- Подвал сайта -->
  <?php include "footer.php";?>
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
