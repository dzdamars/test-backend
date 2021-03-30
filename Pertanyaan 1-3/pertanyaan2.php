<!DOCTYPE html>
<html>
<body>

<?php 
	for ($i=1; $i <= 100; $i++) {
		$y=$i%3;
		$x=$i%5;
	   	if ($y==0 && $x==0) {
	    	echo $i," = FizzBuzz <br>";
	    }elseif($y==0) {
	    	echo $i," = Fizz <br>";
	    }elseif($x==0) {
	    	echo $i," = Buzz <br>";
	    }
	} 
?>

</body>
</html>