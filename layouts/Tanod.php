<?php 
    include_once '../includes/database.php';
    require_once '../includes/functions.php';
    session_start();

    if (empty( $_SESSION["user_type"]) || $_SESSION["user_type"] !== "tanod"){
        header("location: ../landing-page.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Barangay Singko Tres</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/mstyles.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">

<!-- HEADER -->
<?php include '../HF/headertanod.php';?> 

    <!-- MAIN LANDING BODY -->
    <header class="masthead" style="background-image:url('../assets/img/header-bg.jpg');">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span>Welcome To Barangay Singko Tres</span></div>
                <div class="intro-heading text-uppercase"><span>HAVE A GREAT DAY!</span></div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" role="button" href="#announcements">See Announcements</a>
            </div>            
        </div>
    </header>



    <!-- GETTING AND DISPLAYING THE LAST ANNOUNCEMENT SAVED IN THE DATABASE. -->

    <?php


$sql = "SELECT * FROM announcements ORDER BY ID DESC LIMIT 1";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo ' 
          <header class="masthead bg-dark" id="announcements">
              <div class="container">   <!-- class="container" -->
              <br> <br><br>
              <h1 class="intro-heading text-uppercase color-light tanod-announcement"  id="announcement-header"> ANNOUNCEMENT! </h1>  
                  <div class="intro-text">
                                             
                          <div>                    
                              <textarea readonly id="txtArea-announcements" rows="30" cols="90"> '.$row["announce"].'</textarea>
                          </div>
                       
                  </div>
              </div>  
          </header>
          '; 
        }
      }  else 
      echo ' 
      <header class="masthead bg-dark" id="announcements">
          <div class="container">   <!-- class="container" -->
          <br> <br><br>
          <h1 class="intro-heading text-uppercase color-light tanod-announcement"  id="announcement-header"> ANNOUNCEMENT! </h1>  
              <div class="intro-text">
                                         
                      <div>                    
                          <textarea readonly id="txtArea-announcements" rows="30" cols="90">No Announcements Made</textarea>
                      </div>
                   
              </div>
          </div>  
      </header>
      '; 

    ?>


    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/agency.js"></script>

    <!-- FOOTER -->
    <?php include '../HF/footer.php';?> 

</body>