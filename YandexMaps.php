<?php

/**
 * Created by PhpStorm.
 * User: phpNT - http://phpnt.com
 * Date: 14.06.2016
 * Time: 22:39
 */

namespace phpnt\yandexMap;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use phpnt\yandexMap\YandexMapsAsset;

class YandexMaps extends Widget
{
    public $addresses;
    public $cityLat;
    public $cityLon;

    public function init()
    {
        parent::init();
        $this->addresses = ArrayHelper::toArray($this->addresses);
        $this->registerClientScript();
    }

    public function run()
    {
        return $this->render(
            'view',
            [
                'widget' => $this
            ]);
    }

    public function registerClientScript()
    {
        $countPlaces = count($this->addresses);
        $items  = [];
        $i      = 0;
        foreach ($this->addresses as $one) {
            $items[$i]['address']   = $one['address'];
            $items[$i]['latitude']  = $one['latitude'];
            $items[$i]['longitude'] = $one['longitude'];
            $i++;
        }

        $addresses = json_encode($items);
        $view = $this->getView();

        YandexMapsAsset::register($view);

        $js = <<< JS
        ymaps.ready(init);
            var myMap,
                myPlacemark;
        
            function init(){     
                myMap = new ymaps.Map("map", {
                    center: [$this->cityLat, $this->cityLon],
                    zoom: 10,
                    controls: []
                });
                
                myMap.behaviors.disable('scrollZoom');
                myMap.controls.add('zoomControl', { top: 75, left: 5 });
        
                var addresses = $addresses;        
        
                for (var i = 0; i < $countPlaces; i++) {
                    myPlacemark = new ymaps.Placemark([addresses[i]['latitude'], addresses[i]['longitude']], { 
                        hintContent: "" + addresses[i]['address'] + "", 
                    },
                    {
                    iconColor: "#ff0000"
                    });
                
                    myMap.geoObjects.add(myPlacemark);
                }
            }
JS;
        $view->registerJs($js);
    }
}