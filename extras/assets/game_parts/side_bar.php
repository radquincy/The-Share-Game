<form method='POST' id="sidebar">
    
        <input type="submit" name="nextday" value="Next Day!">
        <input type="button" onclick="location='pets.php'" value="Pets Menu">
        <?php 
            if (!empty(@$_SESSION['pets'] && @$_SESSION['pets'] !== 'none')){
                echo 'Pet Selected: '.$_SESSION['pets'];
                $pet_img = $_SESSION['pets'];
                echo "<img src='../images/pets/$pet_img.png' style='width: 120px;'>";
            }else{
                echo 'No Pet Selected';
            }
        ?>
        <input type="submit" name='save' value="Save and Quit">
        <input type="button" onclick="javascript:resetGame();" value="Reset Game">
    
</form>
