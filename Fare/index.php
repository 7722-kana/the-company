<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fare Activity</title>
</head>
<body>
  <form action="" method="post">
    <input type="number" name="age" id="age" placeholder="Age" min="10" max="80" required>

    <br>

    <input type="number" name="km" id="km" placeholder="Distance (km)" min="1" required>

    <br>

    <button type="submit" name="btn_compute">Compute</button>
    
  </form>

  <?php
    include 'Fare.php';

    if(isset($_POST['btn_compute'])){

      $fare = new Fare;

      $fare->setAge($_POST['age']);
      $fare->setKm($_POST['km']);
      $fare->calculateFare();

      echo "Age: " . $fare->getAge() . " years old <br>";
      echo "Distance: " . $fare->getKm() . " km <br>";
      echo "Fare: " . $fare->getFare();
    }

  ?>
</body>
</html>