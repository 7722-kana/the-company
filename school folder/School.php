<?php
class Payment{

  private $student_name;
  private $year_level;
  private $unit;
  private $lab;
  private $total_price;
  private $price;
  private $unitprice;



    //Setters
    function setStudentName($student_name)
    {
        $this->student_name = $student_name;
    }

    function setYearLevel($year_level)
    {
        $this->year_level = $year_level;
    }

    function setUnit($unit)
    {
        $this->unit = $unit;
    }

    function setLab($lab)
    {
        $this->lab = $lab;
    }

    function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;
    }

    function setPrice($price)
    {
        $this->price = $price;
    }

    //Getters
    function getStudentName()
    {
        return $this->student_name;
    }

    function getYearLevel()
    {
        return $this->year_level;
    }

    function getUnit()
    {
        return $this->unit;
    }

    function getLab()
    {
        return $this->lab;
    }

    function getTotalPrice()
    {
        if($this->year_level == 1 && $this->lab == 2){
              $total_price = $this->price + 3359;
        } elseif($this->year_level == 2 && $this->lab == 2){
              $total_price = $this->price + 4000;
    } elseif($this->year_level == 3 && $this->lab == 2){
              $total_price = $this->price + 2890;
    } elseif($this->year_level == 4 && $this->lab == 2){
              $total_price = $this->price + 3555;
    } else {
              $total_price = $this->price;
    }
    return $total_price;
  }

  function getPrice(){
    if($this->year_level == 1){
      $unitprice = 550;
    } elseif($this->year_level == 2){
      $unitprice = 630;
    } elseif($this->year_level == 3){
      $unitprice = 470;
    } elseif($this->year_level == 4){
      $unitprice = 501;
    }
    return $this->price = $this->unit * $unitprice;
  }
}

?>