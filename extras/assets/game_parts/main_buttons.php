<br><br>
<form method="post">
    <article id="TopBar">
        <section id="Day">
            Day: <?php echo $day?>
        </section>

        <section id="RentDue">
            Rent due in:<?php echo $rentday?> Days
        </section>
        <section id="RentPrice">
            Rent Price: $<?php echo $rentpriceL?>
        </section>
        <section id="Money">
            <!-- $m is the letter number to number money-->
            Money: $<?php echo $moneyL ?>
        </section>
    </article>


<!--Sale1--><br>
Share 1 price:$<?php echo $sale1price?><br>
Share 1 Owned:<?php echo $sale1L?><br>
<input type="submit" name="buysale1" value="Buy Share 1! (x1)" id='game_button'>
<input type="submit" name="sellsale1" value="Sell Share 1! (x1)" id='game_button'><br>
<input type="submit" name="buysale1%50" value="Buy Share 1! (50%)" id='game_button'>
<input type="submit" name="sellsale1%50" value="Sell Share 1! (50%)" id='game_button'><br>
<input type="submit" name="buysale1MAX" value="Buy Share 1! (MAX)" id='game_button'>
<input type="submit" name="sellsale1MAX" value="Sell Share 1! (MAX)" id='game_button'><br>
<input type="submit" name="sellsale1rent" value="Sell Share 1! (Rent Price)" id='game_button'>

<!--Sale2--><br><br>
Share 2 price:$<?php echo $sale2price?><br>
Share 2 Owned:<?php echo $sale2L?><br>
<input type="submit" name="buysale2" value="Buy share 2! (x1)" id='game_button'>
<input type="submit" name="sellsale2" value="Sell Share 2! (x1)" id='game_button'><br>
<input type="submit" name="buysale2%50" value="Buy Share 2! (50%)" id='game_button'>
<input type="submit" name="sellsale2%50" value="Sell Share 2! (50%)" id='game_button'><br>
<input type="submit" name="buysale2MAX" value="Buy Share 2! (MAX)" id='game_button'>
<input type="submit" name="sellsale2MAX" value="Sell Share 2! (MAX)" id='game_button'><br>
<input type="submit" name="sellsale2rent" value="Sell Share 2! (Rent Price)" id='game_button'>
</form>