<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start(); 

// function existsUser($login) {
//     $userExist = getUsersList();
//     $index = false;
//     foreach ($userExist as $key => $value) {
//         foreach ($value as $value2) {
//             if ($login == $value2){
//                 $index = $key;
//             }
//         }
//     }
//     return $index;
// }

// function birthDay(){
//     $birthday = $userExist[$index]["birthday"]; //день рождение
//     $arr = explode('.', $birthday);
//     $tm=mktime(0, 0, 0, $arr[1], $arr[0], date('Y'));
//         if($tm<time()) $tm=mktime(0, 0, 0, $arr[1], $arr[0], date('Y')+1);
//             echo intval( ($tm-time())/86400 );
// }

// function getUsersList() {
//     return json_decode(file_get_contents('data/db.json'), true);
// }

if (isset($_SESSION["login"])) {
    $name = $_SESSION["name"] ?? 'Незнакомец';
    // $birthDate = birthDay($_SESSION["time"]);
    $_SESSION["time"] = isset($_SESSION["time"]) ? $_SESSION["time"] : date('Y-m-d H:i:s');
    $time = $_SESSION["time"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>SPA салон</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="header__left">
            <div class="header__logo">
                <img src="/icons/header_logo.png" alt="спа салон">
            </div>
            <nav class="header__links">
                <a href="" class="header__link">Бронирование </a>
                <a href="#" class="header__link">О нас</a>
            </nav>
        </div>
        <div class="header__right-login">
            <div class="user_block">
                <?php if (isset($_SESSION["login"])) {
                            echo "<div class='message'>";
                            echo "<p> С возвращением, " . $name . "</p>";
                            // echo "<p> До Вашего дня рождения осталось " . birthDay() . "</p>";
                            echo "<p> Вы были последний раз " . $time . " </p>";
                            echo "</div>"; 
                            echo '<form  action="logout.php" method="post">
                                  <input type="submit" value="Logoff">
                                  </form>';             
                    } else {
                        echo '<form action="login.php" method="post">
                                    <input type="text" name="user_login">   
                                    <input type="password" name="password">   
                                    <input type="submit" value="Login">
                            </form>';   
                    }
                ?>
            </div>
        </div>
        <div class="header__right">
            <div class="header__right-text"><span>Социальные сети</span></div>
            <a href="https://www.instagram.com" class="header__right-icon">
                <img src="/icons/instagram.png" text-decoration:none alt="instagram">
            </a>
            <a href="https://www.facebook.com" class="header__right-icon">
                <img src="/icons/facebook.png" text-decoration:none alt="facebook">
            </a>
        </div>
    </header>
    <div class="banner">
        <img src="img/saloon.jpg" alt="elite">
    </div>
    <div class="col-12">
            <div class="block">
                <h1 class="products__title">Процедуры</h1>
            </div>
        </div>
    <div class="products">
            <div class="tabcontent">
                <div class="col-12">
                    <img src="img/plng.jpg" alt="elite">
                </div>
            <div class="tabcontent__descr">
                Пилинг . <br>
                 <span class="price">Цена: 2500 руб.</span><br>
                Время процедуры: 40 мин. <br>
            </div>
            </div> 
            <div class="tabcontent">
                    <div class="col-12">
                        <img src="img/frut.jpg" alt="elite">
                    </div>
            <div class="tabcontent__descr">
                Увлажняющее фруктовое обертывание. <br>
                 <span class="price">Цена: 3000 руб.</span><br>
                Время процедуры: 1 час <br>
            </div>
            </div> 
            <div class="tabcontent">
                <div class="col-12">
                    <img src="img/choc.jpg" alt="elite">
                </div> 
            <div class="tabcontent__descr">
                Обертывание шоколадное. <br>
                 <span class="price">Цена: 2500 руб.</span><br>
                Время процедуры: Шоколадное обертывание все тело 1час 30 мин <br>
                <span class="price">Цена: 3500 руб.</span><br>
                Время процедуры: Шоколадное обертывание локально 1 час
                <span class="price">Цена: 3000 руб.</span><br>
            </div>
            </div> 
        </div>
        <div class="col-12">
            <div class="block-offers">
                <h1 class="products__title">Акции</h1>
            </div>
        </div>
    <div class="products-offers">
            <div class="tabcontent-offers">
                <div class="col-12-1">
                    <img src="img/eye_patch.jpg" alt="elite">
                </div>
            <div class="tabcontent__descr-offers">
                Уход "Pro Eye Flash Dermalogica". <br>
                 <span class="price">Цена: <s>3200</s> 2800руб.</span><br>
                Время процедуры: 30 мин. <br>
            </div>
            </div> 
            <div class="tabcontent-offers">
                    <div class="col-12-2">
                        <img src="img/sport-mas.jpg" alt="elite">
                    </div>
            <div class="tabcontent__descr-offers">
                Спортивный массаж. <br>
                 <span class="price">Цена: <s>3000</s> 2400 руб.</span><br>
                Время процедуры: 1 час <br>
            </div>
            </div> 
            <div class="tabcontent-offers">
                <div class="col-12-3">
                    <img src="img/lemon.jpg" alt="elite">
                </div> 
            <div class="tabcontent__descr-offers">
                Программа "Свежесть лемонграсса". <br>
                 <span class="price">Цена: <s>5000</s> 3900 руб.</span><br>
                Время процедуры: 1 час 30 минут. <br>
            </div>
            </div> 
        </div>
 </body>
