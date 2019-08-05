<?php
mb_internal_encoding("UTF-8");
require ('class/PigLatin.php');

if (isset($_GET['text'])) 
     {
     $piglatin=new PigLatin(); //instance třídy
     }
?>
<!DOCTYPE html>
<html>
    <body>
        <head>
            <meta charset="UTF-8"> 
            <link rel="stylesheet" href="style.css" type="text/css"/>
            <h1>Pig Latin Translator</h1>
        </head>     
            <form action="" method="get">
                <label for="text"><strong>English</strong></label><br>
	          <textarea rows="6" cols="75" name="text" id="text"><?php echo htmlspecialchars($_GET['text']); ?></textarea>
                  <p><strong>Piglatin:</strong><mark> <?php $piglatin->translate(); ?></mark></p>
	          <input type="submit" value="Translate">	               
            </form>
    </body>
</html>