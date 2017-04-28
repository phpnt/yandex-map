phpNT - Yandex Map Widget
================================
[![Latest Stable Version](https://poser.pugx.org/phpnt/yandex-map/v/stable)](https://packagist.org/packages/phpnt/yandex-map) [![Total Downloads](https://poser.pugx.org/phpnt/yandex-map/downloads)](https://packagist.org/packages/phpnt/yandex-map) [![Latest Unstable Version](https://poser.pugx.org/phpnt/yandex-map/v/unstable)](https://packagist.org/packages/phpnt/yandex-map) [![License](https://poser.pugx.org/phpnt/yii2-chartjs/license)](https://packagist.org/packages/phpnt/yandex-map)

### Описание:
### Отображает карту города с метками адресов.
### [DEMO](http://phpnt.com/widget/yandex-map)

------------
### - [Поддержать phpNT](http://phpnt.com/donate/index) 
------------

### Социальные сети:
 - [Канал YouTube](https://www.youtube.com/c/phpnt)
 - [Группа VK](https://vk.com/phpnt)
 - [Группа facebook](https://www.facebook.com/Phpnt-595851240515413/)

------------

Установка:

------------

```
php composer.phar require "phpnt/yandex-map" "*"
```
или

```
composer require phpnt/yandex-map
```

или добавить в composer.json файл

```
"phpnt/yandex-map": "*"
```

### Представление:
------------
```php
<?php
use phpnt\yandexMap\YandexMaps;

// Массив меток
$items = [
    [
        'latitude' => 52.906386,
        'longitude' => 59.954092,
        'options' => [
            [
                'hintContent' => 'Подсказка при наведении на маркет',
                'balloonContentHeader' => 'Заголовок после нажатия на маркер',
                'balloonContentBody' => 'Контент после нажатия на маркер',
                'balloonContentFooter' => 'Футер после нажатия на маркер',
            ],
            [
                'preset' => 'islands#icon',
                'iconColor' => '#19a111'
            ]
        ]
    ],
    [
        'latitude' => 55.751812,
        'longitude' => 37.599292,
        'options' => [
            [
                'hintContent' => 'Подсказка при наведении на маркет',
                'balloonContentHeader' => 'Заголовок после нажатия на маркер',
                'balloonContentBody' => 'Контент после нажатия на маркер',
                'balloonContentFooter' => 'Футер после нажатия на маркер',
            ],
            [
                'preset' => 'islands#circleIcon',
                'iconColor' => '#19aa8d',
                'draggable' => true
            ]
        ]
    ],
    [
        'latitude' => 47.250534,
        'longitude' => 39.682889,
        'options' => [
            [
                'hintContent' => 'Подсказка при наведении на маркет',
                'balloonContentHeader' => 'Заголовок после нажатия на маркер',
                'balloonContentBody' => 'Контент после нажатия на маркер',
                'balloonContentFooter' => 'Футер после нажатия на маркер',
            ],
            [
                'preset' => 'islands#blueCircleDotIconWithCaption',
                'iconColor' => '#19aa8d'
            ]
        ]
    ],
    [
        'latitude' => 58.091523,
        'longitude' => 57.805861,
        'options' => [
            [
                'hintContent' => 'Подсказка при наведении на маркет',
                'balloonContentHeader' => 'Заголовок после нажатия на маркер',
                'balloonContentBody' => 'Контент после нажатия на маркер',
                'balloonContentFooter' => 'Футер после нажатия на маркер',
            ],
            [
                'preset' => 'islands#redSportIcon',
                'iconColor' => '#19aa8d'
            ]
        ]
    ],
    [
        'latitude' => 60.091523,
        'longitude' => 75.805861,
        'options' => [
            [
                'hintContent' => 'Подсказка при наведении на маркет',
                'balloonContentHeader' => 'Заголовок после нажатия на маркер',
                'balloonContentBody' => 'Контент после нажатия на маркер',
                'balloonContentFooter' => 'Футер после нажатия на маркер',
            ],
            [
                'preset' => 'islands#governmentCircleIcon',
                'iconColor' => '#3b5998'
            ]
        ]
    ],
];
// вывод карты
echo YandexMaps::widget([
    'myPlacemarks'          => $items,
    'mapOptions'            => [
        'center'            => [52, 59],                                                // центр карты
        'zoom'              => 3,                                                       // показывать в масштабе
        'controls'          => ['zoomControl',  'fullscreenControl', 'searchControl'],  // использовать эл. управления
        'control'           => [
            'zoomControl'   => [                                                        // расположение кнопок управлением масштабом
                'top'       => 75,
                'left'      => 5
            ],
        ],
    ],
    'disableScroll'         => true,                                                    // отключить скролл колесиком мыши (по умолчанию true)
    'windowWidth'           => '100%',                                                  // длинна карты (по умолчанию 100%)
    'windowHeight'          => '400px',                                                 // высота карты (по умолчанию 400px)
]);
```
------------
# Документация:
## [Яндекс карты API](https://tech.yandex.ru/maps/)
------------
### Версия:
### 0.0.1
------------
### Лицензия:
### [MIT](https://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F_MIT)
------------
