<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Net Income Activity</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container row mt-5">
  <div class="col-md-4 mt-5 ms-5 border rounded-1 p-2">
    <form action="" method="post">

      <label for="full_name" class="form-label my-1">Full Name</label>
      <input type="text" name="full_name" class="form-control my-1" placeholder="Enter your name" autofocus required>

      <label for="civil_status" class="form-label my-1">Civil Status</label>
      <select name="civil_status" id="civil_status" class="form-select" required>
          <option value="" hidden>Select Civil Status</option>
          <option value="single">Single</option>
          <option value="married">Married</option>
      </select>

      <label for="position" class="form-label my-1">Position</label>
      <select name="position" id="position" class="form-select" required>
          <option value="" hidden>Select Position</option>
          <option value="admin">Admin</option>
          <option value="staff">Staff</option>
      </select>

      <label for="em_status" class="form-label my-1">Employment Status</label>
      <select name="em_status" id="em_status" class="form-select" required>
          <option value="" hidden>Select Employment Status</option>
          <option value="contractual">Contractual</option>
          <option value="probationary">Probationary</option>
          <option value="regular">Regular</option>
      </select>

      <label for="hours" class="form-label my-1">Regular Hours Rendered</label>
      <input type="number" name="hours" id="hours" class="form-select" min="0" max="40" required>

      <label for="over" class="form-label my-1">Over Time Hours</label>
      <input type="number" name="over" id="over" class="form-select" min="1" max="5" required>

      <button type="submit" name="btn_submit" class="btn btn-success w-100 my-3">Submit</button>

    </form>
  </div>

  <div class="col-md mt-5 mx-auto">

  <?php
  include "Employee.php";
      if(isset($_POST['btn_submit'])){
          $income = new Income(
            $_POST['full_name'],
            $_POST['civil_status'],
            $_POST['position'],
            $_POST['em_status'],
            $_POST['hours'],
            $_POST['over']
          );
          //Setters
          $net_income = $income->calculateNetIncome();

          //Getters
          echo "<div class='col-md-9 mt-4'>";
          echo "<table class='table table-striped'>";
          echo "<tr><th class='table table-striped table-dark text-white w-25'>Full Name</th><td>".$income->getFullName()."</td></tr>";

          echo "<tr><th class='table-dark text-white w-25'>Civil Status</th><td>".$income->getCivilStatus()."</td></tr>";

          echo "<tr><th class='table-dark text-white w-25'>Position</th><td>".$income->getPosition()."</td></tr>";

          echo "<tr><th class='table-dark text-white w-25'>Employment Status</th><td>".$income->getEmStatus()."</td></tr>";

          echo "<tr><th class='table-dark text-white w-25'>Gross Income</th><td><br>".$income->calculateGrossIncome()."<p class='form-text'>Regular pay:( hurs x /day) + OT Pay: ( hours x 40/hours)</p></td></tr>";

          echo "<tr><th class='table-dark text-white w-25'>Net Income</th><td>$net_income<br><p class='form-text'>Gross Income:() +(Tax: + Health Care: )</p></td></tr>";
          echo "</table>";
          echo "</div>";


      }
  ?>

  </div>
</div>


</body>
</html>