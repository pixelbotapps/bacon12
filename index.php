<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Credential</title>
  </head>
  <body><br><br>
    <div class="col-8"><br>
          <form action="index.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Enter Credential</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Credential" name="credd">
          </div>
  <div class="container">
    <div class="row">
        <h2>Check Credential</h2>
    </div>
    <div class="row justify-content-md-center">
         
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
          </div>
             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
          </div>
     <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
          </div>
      </div>
    <div class="row justify-content-md-center">
      <div class="col-10"><br>
<?php
require_once 'google-api-php-client-2.4.1/vendor/autoload.php';
$client = new \Google_Client();
$client->setApplicationName('GBUJobs');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('online');
$client->setAuthConfig(__DIR__ . '/api.json');
$service = new Google_Service_Sheets($client);
$spreadsheetId = "1W89pRZ1FTBrc04st-h7nhk8iuPeIc85dBMr1byAV64U";
$range = 'responses';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
        

if (isset($_POST['submit'])) {
    $credd = $_POST["credd"];
    if (empty($values)) {
        echo "No Data Found";
    } elseif (empty($credd)) {
        $b = 2;
    } else {
        //$mask = "%10 %-10s %s\n";
        $b = 0;
        echo "<ul class='list-group'>";
        foreach ($values as $row) {
            $name = $row[2];
            $mail = $row[1];
            $ncs_id = $row[3];
            $grade = $row[4];
            $ws_name = $row[5];
            $ws_date = $row[6];
            $link = $row[8];
            if (strcmp($credd, $ncs_id) == 7) {
                $b = 1;
                echo "<li class='list-group-item'><strong style ='font-size: 25px;'>$name</strong>";
                echo "<br /><strong>Email: </strong>$mail";
                echo "<br /><strong>NCS ID: </strong>".$ncs_id;
                echo "<br /><strong>Grade: </strong>".$grade;
                echo "<br /><strong>Workshop Name: </strong>".$ws_name."<br /><strong>Date: </strong>".$ws_date;
                //echo "<li class='list-group-item'><small>Workshop Date:".$ws_date."</small></li>";
                echo "<br /><a href= '$link'>$link</a></li>";
            }
        }
        if ($b == 7) {
            echo "<li class='list-group-item'>No Record Found</li>";
        } else {
            echo "";
        }
        echo "</ul>";
    }
}
 ?>
 </div>
</div>
 </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
