<?php
/**
 * Created by PhpStorm.
 * User: phpNT - http://phpnt.com
 * Date: 28.04.2017
 * Time: 8:00
 */

namespace phpnt\yandexMap;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class YandexMaps extends Widget
{
    public $myPlacemarks;
    public $mapOptions;
    public $additionalOptions = ['searchControlProvider' => 'yandex#search'];

    public $disableScroll   = true;

    public $windowWidth = '100%';
    public $windowHeight = '400px';

    public function init()
    {
        parent::init();
        $this->myPlacemarks = ArrayHelper::toArray($this->myPlacemarks);
        $this->mapOptions = Json::encode($this->mapOptions);
        $this->additionalOptions = Json::encode($this->additionalOptions);
        $this->disableScroll = $this->disableScroll ? 1 : 0;
        $this->registerClientScript();
    }

    public function run()
    {

        //dd($this->id);
        return $this->render(
            'view',
            [
                'widget' => $this
            ]);
    }

    public function registerClientScript()
    {
        $countPlaces = count($this->myPlacemarks);
        $items  = [];
        $i      = 0;
        foreach ($this->myPlacemarks as $one) {
            $items[$i]['latitude']  = $one['latitude'];
            $items[$i]['longitude'] = $one['longitude'];
            $items[$i]['options'] = $one['options'];
            $i++;
        }

        $myPlacemarks = json_encode($items);
        $view = $this->getView();

        YandexMapsAsset::register($view);

        $js = <<< JS
        ymaps.ready(init);
            var myMap,
                myPlacemark;
        
            function init(){
                myMap = new ymaps.Map("$this->id", {$this->mapOptions}, {$this->additionalOptions});
                
                var disableScroll = $this->disableScroll;
                if ($this->disableScroll) {
                    myMap.behaviors.disable('scrollZoom');                    
                }

                var myPlacemarks = $myPlacemarks;        
        
                for (var i = 0; i < $countPlaces; i++) {
                    myPlacemark = new ymaps.Placemark([myPlacemarks[i]['latitude'], myPlacemarks[i]['longitude']],
                    myPlacemarks[i]['options'][0],
                    myPlacemarks[i]['options'][1],
                    myPlacemarks[i]['options'][2],
                    myPlacemarks[i]['options'][3],
                    myPlacemarks[i]['options'][4],
                    myPlacemarks[i]['options'][5],
                    );
                
                    myMap.geoObjects.add(myPlacemark);
                }
            }
JS;
        $view->registerJs($js);
    }
}
