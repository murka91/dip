<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Мейн-кун: Величественная кошка</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Montserrat+Alternates:wght@700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <style>
        /* Ваши базовые стили с некоторыми улучшениями */
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F8F3E6;
            color: #2C2A29;
            scroll-behavior: smooth;
        }

        h2 {
            font-family: 'Montserrat Alternates', sans-serif;
            font-size: 36px;
            font-weight: bold;
            color: #A45A2A;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        h3 {
            font-family: 'Montserrat Alternates', sans-serif;
            font-weight: bold;
            color: #A45A2A;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        h4 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            color: #7c4422;
            margin: 10px 0 8px;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 15px;
        }

        /* Навигация */
        .breed-nav {
            padding: 10px 0;
            background: #fff9f0;
            box-shadow: 0 2px 8px rgba(164, 90, 42, 0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .breed-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .breed-nav li {
            margin: 0;
        }

        .breed-nav a {
            color: #A45A2A;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s ease;
            padding: 6px 10px;
            border-radius: 12px;
        }

        .breed-nav a:hover,
        .breed-nav a:focus {
            color: #7c4422;
            background-color: rgba(164, 90, 42, 0.1);
            outline: none;
        }

        /* Основной контент */
        .main-content {
            padding: 30px 0 60px;
        }

        .breed-section {
            margin-bottom: 60px;
        }

        .breed-section h2 {
            font-size: 32px;
            text-align: center;
            margin-bottom: 30px;
        }

        .breed-image {
            width: 50%;
            max-width: 600px;
            height: auto;
            border-radius: 12px;
            display: block;
            margin: 20px auto 0;
            box-shadow: 0 6px 12px rgba(164, 90, 42, 0.25);
            transition: transform 0.3s ease;
        }

        .breed-image:hover {
            transform: scale(1.03);
        }

        /* Вкладки */
        .tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .tab-button {
            padding: 10px 18px;
            color: #fff;
            background-color: #A45A2A;
            border-radius: 20px;
            font-size: 16px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            border: none;
            cursor: pointer;
            box-shadow: 0 3px 7px rgba(0, 0, 0, 0.1);
            transition:
                background-color 0.3s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            user-select: none;
        }

        .tab-button:hover:not(.active),
        .tab-button:focus:not(.active) {
            background-color: #7c4422;
            outline: none;
            transform: scale(1.05);
            box-shadow: 0 5px 12px rgba(124, 68, 34, 0.4);
        }

        .tab-button.active {
            background-color: #7c4422;
            box-shadow: 0 5px 15px rgba(124, 68, 34, 0.6);
        }

        .tab-content {
            display: none;
            animation: fadeIn 0.5s ease forwards;
            max-width: 1200px;
            margin: 0 auto;
        }

        .tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Стили для внешнего вида */
        .appearance-grid {
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
            gap: 15px;
        }

        .appearance-item {
            flex: 1 1 30%;
            text-align: center;
            background: #fff9f0;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 3px 10px rgba(164, 90, 42, 0.15);
            transition: box-shadow 0.3s ease;
        }

        .appearance-item:hover {
            box-shadow: 0 6px 20px rgba(164, 90, 42, 0.3);
        }

        .appearance-item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 12px;
            box-shadow: 0 4px 10px rgba(164, 90, 42, 0.2);
        }

        /* Списки характера и ухода */
        .character-list,
        .care-steps {
            margin-left: 20px;
            margin-top: 15px;
            color: #5a3e1b;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .character-list li,
        .care-steps li {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .character-list li i,
        .care-steps li i {
            color: #A45A2A;
            min-width: 20px;
            font-size: 1.2rem;
        }

        /* Галерея */
        .gallery-slider {
            max-width: 800px;
            margin: 0 auto;
        }

        .gallery-slider img {
            width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 6px 14px rgba(164, 90, 42, 0.3);
            transition: transform 0.3s ease;
        }

        .gallery-slider img:hover {
            transform: scale(1.05);
        }

        /* Дополнительные секции */
        .breed-history,
        .breed-health,
        .faq-section {
            background: #fff9f0;
            padding: 25px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(164, 90, 42, 0.15);
            max-width: 900px;
            margin: 40px auto;
        }

        .breed-history h3,
        .breed-health h3,
        .faq-section h3 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 28px;
            text-align: center;
            color: #A45A2A;
            font-family: 'Montserrat Alternates', sans-serif;
            font-weight: 700;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        .breed-history p,
        .breed-health p,
        .faq-section p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #3a2e2e;
            margin-bottom: 15px;
        }

        /* FAQ */
        .faq-list {
            list-style: none;
            padding: 0;
            max-width: 900px;
            margin: 0 auto;
        }

        .faq-list li {
            margin-bottom: 15px;
            border-bottom: 1px solid #d9cbbf;
            padding-bottom: 12px;
        }

        .faq-list li strong {
            display: block;
            font-weight: 700;
            color: #7c4422;
            margin-bottom: 6px;
        }

        /* Адаптивность */
        @media (max-width: 768px) {
            .appearance-item {
                width: 100%;
                flex-basis: 100%;
            }

            .tabs {
                flex-direction: column;
                gap: 10px;
            }

            .tab-button {
                margin: 0 auto;
            }

            .breed-image {
                width: 90%;
            }

            .gallery-slider {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

    <?php include "header.php"; ?>

    <nav class="breed-nav" aria-label="Навигация по разделам">
        <div class="container">
            <ul>
                <li><a href="#about"><i class="fas fa-info-circle" aria-hidden="true"></i> <span>О породе</span></a></li>
                <li><a href="#details"><i class="fas fa-cat" aria-hidden="true"></i> <span>Подробнее</span></a></li>
                <li><a href="#gallery"><i class="fas fa-images" aria-hidden="true"></i> <span>Галерея</span></a></li>
                <li><a href="#history"><i class="fas fa-book" aria-hidden="true"></i> <span>История породы</span></a></li>
                <li><a href="#health"><i class="fas fa-heartbeat" aria-hidden="true"></i> <span>Здоровье</span></a></li>
                <li><a href="#faq"><i class="fas fa-question-circle" aria-hidden="true"></i> <span>Вопрос-Ответ</span></a></li>
            </ul>
        </div>
    </nav>

    <main class="main-content" role="main">
        <section id="about" class="breed-section" tabindex="-1">
            <div class="container">
                <h2>Мейн-кун: Величественная кошка</h2>
                <p>Мейн-куны – это не просто кошки, это настоящие компаньоны. Они сочетают в себе внушительный внешний вид с ласковым и игривым характером.</p>
                <img src="images/35a.jpg" alt="Мейн-кун" class="breed-image" loading="lazy" />
            </div>
        </section>

        <section id="details" class="breed-section" tabindex="-1">
            <div class="container">
                <div class="tabs" role="tablist" aria-label="Подробная информация о породе">
                    <button class="tab-button active" data-tab="appearance" role="tab" aria-selected="true" aria-controls="appearance" id="tab-appearance">
                        <i class="fas fa-paw" aria-hidden="true"></i> Внешний вид
                    </button>
                    <button class="tab-button" data-tab="character" role="tab" aria-selected="false" aria-controls="character" id="tab-character">
                        <i class="fas fa-heart" aria-hidden="true"></i> Характер
                    </button>
                    <button class="tab-button" data-tab="care" role="tab" aria-selected="false" aria-controls="care" id="tab-care">
                        <i class="fas fa-bath" aria-hidden="true"></i> Уход
                    </button>
                </div>

                <article id="appearance" class="tab-content active" role="tabpanel" aria-labelledby="tab-appearance" tabindex="0">
                    <h3>Внешний вид</h3>
                    <div class="appearance-grid">
                        <div class="appearance-item">
                            <img src="images/b1.jpg" alt="Хвост Мейн-куна" loading="lazy" />
                            <h4>Хвост</h4>
                            <p>Длинный и пушистый, как перо, помогает кошке сохранять равновесие и тепло зимой.</p>
                        </div>
                        <div class="appearance-item">
                            <img src="images/b2.jpg" alt="Уши Мейн-куна" loading="lazy" />
                            <h4>Уши</h4>
                            <p>Большие с кисточками на кончиках — отличительная черта породы, придающая им выразительность и шарм.</p>
                        </div>
                        <div class="appearance-item">
                            <img src="images/b3.jpg" alt="Шерсть Мейн-куна" loading="lazy" />
                            <h4>Шерсть</h4>
                            <p>Длинная, густая и шелковистая, защищающая от холода и влаги, особенно в области шеи и живота.</p>
                        </div>
                    </div>
                </article>

                <article id="character" class="tab-content" role="tabpanel" aria-labelledby="tab-character" tabindex="0">
                    <h3>Характер</h3>
                    <p>Мейн-куны — это ласковые и умные животные с невероятным чувством юмора. Они любят внимание и легко находят общий язык с детьми и другими питомцами.</p>
                    <ul class="character-list">
                        <li><i class="fas fa-smile"></i> Дружелюбные и общительные</li>
                        <li><i class="fas fa-play"></i> Игривые и активные</li>
                        <li><i class="fas fa-comments"></i> Общительные и разговорчивые</li>
                        <li><i class="fas fa-brain"></i> Интеллектуальные и любознательные</li>
                    </ul>
                </article>

                <article id="care" class="tab-content" role="tabpanel" aria-labelledby="tab-care" tabindex="0">
                    <h3>Уход</h3>
                    <p>Уход за мейн-куном требует внимания к шерсти и здоровью, но при правильном подходе он не доставит хлопот.</p>
                    <ol class="care-steps">
                        <li><i class="fas fa-brush"></i> Регулярное вычесывание шерсти — минимум 2-3 раза в неделю.</li>
                        <li><i class="fas fa-cut"></i> Стрижка когтей по мере необходимости, обычно раз в 2-3 недели.</li>
                        <li><i class="fas fa-veterinary"></i> Регулярные ветеринарные осмотры и вакцинация.</li>
                        <li><i class="fas fa-tooth"></i> Уход за зубами — чистка и специальные лакомства.</li>
                        <li><i class="fas fa-dumbbell"></i> Обеспечение достаточной физической активности и игр.</li>
                    </ol>
                </article>
            </div>
        </section>

        <section id="gallery" class="breed-section" tabindex="-1">
            <div class="container">
                <h2>Галерея</h2>
                <div class="gallery-slider" aria-label="Галерея изображений мейн-кунов">
                    <div><img src="images/x1.jpg" alt="Мейн-кун сидит на подоконнике" loading="lazy" /></div>
                    <div><img src="images/x2.jpg" alt="Мейн-кун крупным планом" loading="lazy" /></div>
                    <div><img src="images/x3.jpg" alt="Игривая кошка мейн-кун" loading="lazy" /></div>
                    <div><img src="images/x4.jpg" alt="Мейн-кун с пушистым хвостом" loading="lazy" /></div>
                    <div><img src="images/x5.jpg" alt="Крупный мейн-кун на природе" loading="lazy" /></div>
                </div>
            </div>
        </section>

        <section id="history" class="breed-history" tabindex="-1">
            <div class="container">
                <h3>История породы</h3>
                <p>Порода мейн-кун берет своё начало в США, в штате Мэн, где эти кошки помогали фермерам ловить мышей и крыс. Благодаря своей силе, размеру и выносливости, они быстро завоевали популярность и стали символом штата.</p>
                <p>Существует множество легенд о происхождении мейн-кунов, включая мифы о скрещивании с рысью или даже с енотом, но на самом деле это естественная порода, сформировавшаяся в суровых климатических условиях.</p>
                <p>Сегодня мейн-куны — одна из самых популярных и любимых пород во всем мире, ценимая за свой характер и внешний вид.</p>
            </div>
        </section>

        <section id="health" class="breed-health" tabindex="-1">
            <div class="container">
                <h3>Здоровье</h3>
                <p>Мейн-куны — крепкие и здоровые кошки, но, как и у всех пород, у них есть склонность к некоторым наследственным заболеваниям:</p>
                <ul class="character-list">
                    <li><i class="fas fa-heart"></i> Кардиомиопатия — заболевание сердца.</li>
                    <li><i class="fas fa-bone"></i> Дисплазия тазобедренного сустава.</li>
                    <li><i class="fas fa-dna"></i> Поликистоз почек (редко).</li>
                </ul>
                <p>Важно регулярно посещать ветеринара и поддерживать сбалансированное питание, чтобы обеспечить долгую и здоровую жизнь питомцу.</p>
            </div>
        </section>

        <section id="faq" class="faq-section" tabindex="-1">
            <div class="container">
                <h3>Вопрос-Ответ</h3>
                <ul class="faq-list">
                    <li>
                        <strong>Сколько живут мейн-куны?</strong>
                        <p>В среднем 12-15 лет при хорошем уходе и правильном питании.</p>
                    </li>
                    <li>
                        <strong>Насколько мейн-куны подходят для семей с детьми?</strong>
                        <p>Очень подходят! Это дружелюбные и терпеливые кошки, которые любят играть и общаться.</p>
                    </li>
                    <li>
                        <strong>Как часто нужно вычесывать мейн-куна?</strong>
                        <p>Рекомендуется минимум 2-3 раза в неделю, чтобы избежать колтунов и сохранить шерсть здоровой.</p>
                    </li>
                    <li>
                        <strong>Можно ли содержать мейн-куна в квартире?</strong>
                        <p>Да, при условии достаточного количества игр и активности. Мейн-куны любят пространство, но адаптируются и к квартире.</p>
                    </li>
                </ul>
            </div>
        </section>
    </main>

    <?php include "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            // Переключение вкладок с поддержкой ARIA
            $('.tab-button').click(function () {
                var tabId = $(this).data('tab');

                $('.tab-button').attr('aria-selected', 'false').removeClass('active');
                $(this).attr('aria-selected', 'true').addClass('active');

                $('.tab-content').removeClass('active').attr('tabindex', '-1');
                $('#' + tabId).addClass('active').attr('tabindex', '0').focus();
            });

            // Инициализация слайдера галереи
            $('.gallery-slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                adaptiveHeight: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 4000,
                pauseOnHover: true,
                accessibility: true
            });
        });
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

