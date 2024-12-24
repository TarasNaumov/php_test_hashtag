<?php

$quiz = [
    [
        "question" => "Яка столиця Франції?",
        "options" => [
            "a" => "Париж",
            "b" => "Лондон",
            "c" => "Берлін",
            "d" => "Мадрид"
        ],
        "correct_answer" => "a"
    ],
    [
        "question" => "Скільки континентів на Землі?",
        "options" => [
            "a" => "5",
            "b" => "6",
            "c" => "7",
            "d" => "8"
        ],
        "correct_answer" => "c"
    ],
    [
        "question" => "Яка найбільша планета в Сонячній системі?",
        "options" => [
            "a" => "Земля",
            "b" => "Марс",
            "c" => "Юпітер",
            "d" => "Сатурн"
        ],
        "correct_answer" => "c"
    ],
    [
        "question" => "Хто написав 'Кобзар'?",
        "options" => [
            "a" => "Леся Українка",
            "b" => "Іван Франко",
            "c" => "Тарас Шевченко",
            "d" => "Григорій Сковорода"
        ],
        "correct_answer" => "c"
    ],
    [
        "question" => "Яка хімічна формула води?",
        "options" => [
            "a" => "H2O",
            "b" => "CO2",
            "c" => "O2",
            "d" => "NaCl"
        ],
        "correct_answer" => "a"
    ],
    [
        "question" => "Яка країна має найбільшу кількість населення?",
        "options" => [
            "a" => "Індія",
            "b" => "Китай",
            "c" => "США",
            "d" => "Індонезія"
        ],
        "correct_answer" => "b"
    ],
    [
        "question" => "Яке найбільше озеро в світі?",
        "options" => [
            "a" => "Каспійське море",
            "b" => "Вікторія",
            "c" => "Гурон",
            "d" => "Мічиган"
        ],
        "correct_answer" => "a"
    ],
    [
        "question" => "Скільки хвилин в одній годині?",
        "options" => [
            "a" => "50",
            "b" => "60",
            "c" => "70",
            "d" => "80"
        ],
        "correct_answer" => "b"
    ],
    [
        "question" => "Який метал має хімічний символ Fe?",
        "options" => [
            "a" => "Фтор",
            "b" => "Золото",
            "c" => "Залізо",
            "d" => "Мідь"
        ],
        "correct_answer" => "c"
    ],
    [
        "question" => "Який океан найбільший?",
        "options" => [
            "a" => "Індійський",
            "b" => "Атлантичний",
            "c" => "Тихий",
            "d" => "Північний Льодовитий"
        ],
        "correct_answer" => "c"
    ]
];

$_SESSION['date'] = date("Y-m-d H:i", strtotime("+1 hour"));
$randomQuestions = array_rand($quiz, 5);
?>
