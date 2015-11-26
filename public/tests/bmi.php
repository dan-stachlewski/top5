<?php

function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data))); 
}

function calculate_bmi($weight, $height){
	return $weight/($height * $height);
}

$name = "";
$weight = "";
$height = "";
$errorMessage = "";

if (isset($_POST['formSubmit']) && $_POST['formSubmit'] == "Submit") {
    $errorMessage = "";

    $name = clean_input($_POST['name']);
    $weight = clean_input($_POST['weight']);
    $height = clean_input($_POST['height']);

    if (!filter_var($weight, FILTER_VALIDATE_FLOAT)) {
        $errorMessage .= "<li>Please enter your weight</li>";
    }
   
    if (!filter_var($height, FILTER_VALIDATE_FLOAT)) {
        $errorMessage .= "<li>Please enter your height</li>";
    }
      
    if (empty($errorMessage)) {
        echo "Your BMI is: " . number_format(calculate_bmi($weight, $height), 2);
		echo "<br><a href='{$_SERVER['PHP_SELF']}'>again?</a>";
        exit;
    }
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
    <head>
        <title>My Form</title>
    </head>

    <body>
        <?php
        if (!empty($errorMessage)) {
            echo("<p>There was an error with your form:</p>\n");
            echo("<ul>" . $errorMessage . "</ul>\n");
        }
        ?>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <p>
                What is your name?<br>
                <input type="text" name="name" maxlength="50" value="<?= $name; ?>" />
            </p>
            <p>
                What is your weight(kg)?<br>
                <input type="text" name="weight" maxlength="50" value="<?= $weight; ?>" />
            </p>	
            <p>
                What is your height(m)?<br>
                <input type="text" name="height" maxlength="250" value="<?= $height; ?>" />
            </p>	
            <input type="submit" name="formSubmit" value="Submit" />
        </form>
    </body>
</html>