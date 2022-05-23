<!DOCTYPE html>
<?php
    require_once('../extras/important/connect.php');
    require_once('../extras/important/needed.php');
?>
<link rel="stylesheet" href="../css/stylesheet.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shares Game - Bug Report</title>
</head>
<body style="text-align: center">
    <!--Headings-->
    <div class="topheading">
        <img src="../images/logo2.png" style="width: 200px;">
        <p>Bug Report</p>
    </div>
</body>

<?php 

if(isset($_POST['submit_report'])){
    $filtered_report_type = filter_var($_POST['report_type'], FILTER_UNSAFE_RAW);
    $filtered_explanation = filter_var($_POST['explanation'], FILTER_UNSAFE_RAW);

    if(!empty($filtered_report_type) && !empty($filtered_explanation)){

        if (strlen($filtered_explanation) <= 600){

            mysqli_query ($connection,"INSERT INTO sg_report (UserKey, category, explanation) 
            VALUES('$userkey','$filtered_report_type','$filtered_explanation')");

            echo "<div class=\"note_good\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                Thank you for submitting a report
            </div>";
        }else{
            echo "<div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                There were too many characters in your explication please make sure your explication under 600 characters
            </div>";
        }

    }else{
        echo "<div class=\"note_warn\">
                <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                One of the inputs was left empty so the report was not submitted
            </div>";
        }
    }

?>

<br><br>
<p>
    Welcome to the bug report! This is where you can submit problems that the game has here.<br>
    your account details will be saved with the report and only accessed if there was inappropriate use of the reporter and you can possibly get banned<br>
    some of the reasons of inappropriate use is false reports, multiple of the same report, reporting something that isn't a problem, inaccurate reports, ect.<br>
    please keep the report factual and non bias, and keep the explications as simple and short as possible<br>
</p>
<br><br>

<form method="POST">
    <select name="report_type" id="report_type" class='report_type' style='width:20%' required>
        <option value="">select a category</option>
        <option value="account">Sign In / Account / Account Setting's / create account</option>
        <option value="game">Game feature / function</option>    
        <option value="version">Version / How To Play</option>
        <option value="menu">Menu Problem</option>
        <option value="leader">Leader board</option>
        <option value="spelling">Spelling / Grammar</option>
        <option value="notification">Notifications</option>
        <option value="other">other</option>

    </select>
    <br><br>

    <textarea id="explanation" name="explanation" rows="6" cols="50" style="width:85%" placeholder="Explanation of the Problem" maxlength="600" required></textarea><br>

    <input type="submit" name="submit_report" value="Submit Report">

</form>



<br><br>
<input type="button" onclick="location='../game/home.php'" value="Home">

