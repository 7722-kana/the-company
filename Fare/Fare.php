<?php
class Fare{

    private $age;
    private $km;
    private $fare;

    public function setAge($new_age){
      if($new_age >= 10 && $new_age <= 80){
          $this->age = $new_age;
      } else{
        $this->age = 10;
      }
    }
    public function getAge(){
        return $this->age;
    }

    public function setKm($new_km){
      if($new_km >= 0){
          $this->km = $new_km;
      } else{
          $this->km = 0;
      }
    }
    public function getKm(){
      return $this->km;
    }

    public function getFare(){
        return $this->fare;
    }

    public function calculateFare(){
        $base_fare = 8;
        $add_km_fare = 1;

        $total_km = $this->km;
        $total_fare = $base_fare;

        if($total_km >= 4){
          $total_fare += ($total_km - 4) * $add_km_fare;
        }

        if($this->age >= 60){
            $total_fare *= 0.8;
        }

        $this->fare = round($total_fare, 2);
    }
}

?>