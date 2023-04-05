<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
	session_start();

	if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
	    // Om användaren är inloggad
	?>
		<h2>Miniräknare</h2>
		<form method="POST" action="">
		    <input type="number" name="num1" placeholder="Skriv in tal 1" required>
		    <select name="operator" required>
		        <option value="+">+</option>
		        <option value="-">-</option>
		        <option value="*">*</option>
		        <option value="/">/</option>
		    </select>
		    <input type="number" name="num2" placeholder="Skriv in tal 2" required>
		    <input type="submit" name="submit" value="Beräkna">
		</form>

		<?php
		// Om användaren har skickat in formuläret
		if (isset($_POST['submit'])) {
		    $num1 = $_POST['num1'];
		    $num2 = $_POST['num2'];
		    $operator = $_POST['operator'];
		    $result = '';

		    switch ($operator) {
		        case '+':
		            $result = $num1 + $num2;
		            break;
		        case '-':
		            $result = $num1 - $num2;
		            break;
		        case '*':
		            $result = $num1 * $num2;
		            break;
		        case '/':
		            if ($num2 == 0) {
		                $result = 'Error: Division by zero';
		            } else {
		                $result = $num1 / $num2;
		            }
		            break;
		        default:
		            $result = 'Invalid operator';
		            break;
		    }

		    // Skriv ut resultatet
		    echo '<h3>Resultat: '.$result.'</h3>';
		}
		?>

		<h1>Bye <?php echo $_SESSION['name']; ?></h1>
		<a href="logout.php">Logout</a>
	<?php 
	} else {
	    // Om användaren inte är inloggad
	    header("Location: index.php");
	    exit();
	}
	?>