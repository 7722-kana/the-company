<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Activity</title>
  <!--Local link-->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!--Online / CDN-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!--Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<main class="container">
  <form action="" method="post">
    <div class="card mt-5 mx-auto w-25">
      <div class="card-header">
        <h1 class="h5 text-center">REGISTRATION</h1>
      </div>
      <div class="card-body">
        <label for="student_name" class="form-label my-1">Name</label>
        <input type="text" name="student_name" id="student_name" class="form-control">

        <label for="year_level" class="form-label my-1">Year Level</label>
        <select name="year_level" id="year_level"class="form-select" required>
          <option value="" hidden>Select your year level</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>

        <label for="units" class="form-label my-1">Total Units</label>
        <input type="number" name="units" class="form-control my-1" placeholder="Maximum of 23" min="1" max=23 required>

        <input type="radio" class="form-check-input my-1 mx-1" name="lab" id="withLab" value="2">
        <label for="withLab" class="form-check-label my-1 mx-1">With Lab</label>
        <input type="radio" class="form-check-input my-1 mx-1" name="lab" id="withoutLab" value="1">
        <label for="withoutLab" class="form-check-label my-1 mx-1">Without Lab</label>        
        <button type="submit" name="btn_submit" class="btn btn-dark w-100 my-3">Submit</button>
      </div>


      <?php
        include 'School.php';
        if(isset($_POST['btn_submit'])){

          $pay = new Payment;

          $pay->setStudentName($_POST['student_name']);
          $pay->setYearLevel($_POST['year_level']);
          $pay->setUnit($_POST['units']);
          $pay->setLab($_POST['lab']);

          echo "<div class='card card-footer w-100 mx-auto mt-4'>";
          echo "<p>Sudent Name: " . $pay->getStudentName() . "</p>";
          echo "<p>Year Level: " . $pay->getYearLevel() . "</p>";
          echo "<p>No. of units: " . $pay->getUnit() . "</p>";
          echo "<p>Lab Value: " . $pay->getLab() . "</p>";
          echo "<p>Price: " . $pay->getPrice() . "</p>";
          echo "<p>Total Price: " . $pay->getTotalPrice() . "</p>";
          echo "</div>";
        }
      ?>
    </div>
  </form>

</main>
  
</body>
</html>
