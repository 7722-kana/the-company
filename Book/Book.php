<?php
class Book{

  //properties
    private $title;
    private $price;

    #Setters
    // public function  setTitle($new_title){
    //     $this->title = $new_title;
    // }

    #constructor
    public function __construct($title, $price){
        $this->title = $title;
        $this->price = $price;

    }

    #Getters
    public function getTitle(){
        return $this->title;
    }

    // public function  setPrice($new_price){
    //     $this->price = $new_price;
    // }

    public function getPrice(){
        return $this->price;
    }

}




$math = new Book("Calculus", 150);

echo $math->getTitle();
echo "<br>";
echo $math->getPrice();




?>