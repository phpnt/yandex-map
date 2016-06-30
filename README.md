phpNT - Yandex Map Widget
================================
------------
### - [Поддержать phpNT](http://phpnt.com/donate/index) 
------------
### Социальные сети
 - [Канал YouTube](https://www.youtube.com/c/phpnt)
 - [Группа VK](https://vk.com/phpnt)
 - [Группа facebook](https://www.facebook.com/Phpnt-595851240515413/)


Отображает карту города с метками адресов.
------------
### [DEMO](http://phpnt.com/widget/yandex-map)
------------
Установка
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

### Представление
------------
```php
<?php
use phpnt\yandexMap\YandexMaps;

/* Передаем в виджет массив или объект c адресами, обязательными полями address, latitude, longitude. В свойстах cityLat и cityLon указываем координаты города. */

$addresses = [
    [
        'address'     => 'проспект Ленина, 1',
        'latitude'    => '56.30046',
        'longitude'   => '43.93859'
    ],
    [
        'address' => 'бульвар Мира, 17',
        'latitude' => '56.32934',
        'longitude' => '43.95339'
    ],
    [
        'address' => 'улица Фрунзе, 1',
        'latitude' => '56.32533',
        'longitude' => '44.03215'
    ],
    [
        'address' => 'улица Академика Вавилова, 7',
        'latitude' => '56.36931',
        'longitude' => '43.83318',
    ],
    [
        'address' => 'улица Кулибина, 14',
        'latitude' => '56.30265',
        'longitude' => '43.98601',
    ],
];

/* массив */
echo YandexMaps::widget(
    [
        'addresses' => $addresses,
        'cityLat'   => 56.33,
        'cityLon'   => 44.00
    ]);

/* объект */
YandexMaps::widget(
    [
        'addresses' => $widget->addresses,
        'cityLat'   => $widget->lat,
        'cityLon'   => $widget->lon
    ]); ?>
```
------------
# Документация
## [Яндекс карты API](https://tech.yandex.ru/maps/)
------------
### Версия:
### 0.0.1
------------
### Лицензия:
### [MIT](https://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F_MIT)
------------
