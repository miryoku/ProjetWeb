<?php
    echo $manga;
    echo "</br>";
    echo $detail;
    print_r($manga);

?>
    
<form action="" method="post">
    quantite  <select name="quantite">
    <option value="1" selected>1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>

  </select>
    <input type="submit" name="send" value="Envoie">

</form>