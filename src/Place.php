<?php
    class Place{
        private $city;

        function __construct($city_name){
            $this->city = $city_name;
        }

        function getCity(){
            return $this->city;
        }

        function setCity($new_city){
            $this->city = $new_city;
        }

        function save()
        {
            array_push($_SESSION['list_of_places'], $this);
        }

    }



 ?>
