<!DOCTYPE html>
<html>
<body>

<!--Triangle-->
<?php 
	for( $a=10;$a>0;$a--){
	for($i=1; $i<=$a; $i++){
	echo "_";

	}
	for($a1=10;$a1>$a;$a1--){
	echo"*";
	}
	for($a2=10;$a2>$a;$a2--){
	echo"*";
	}
	echo"<br>";
	}
?>

<br><br><br>

<!--Inverted Triangle-->
<?php 
	for($b=0; $b<=10;$b++){
	for($j=1;$j<=$b;$j++){
	echo"_";
	}
	for($b1=10; $b1>$b;$b1--){
	echo"*";
	}
	for($b2=10; $b2>$b;$b2--){
	echo"*";
	}
	echo"<br>";
	}
?>

<br><br><br>
<!--Diamond-->
<?php 
	for( $a=10;$a>0;$a--){
	for($i=1; $i<=$a; $i++){
	echo "_";

	}
	for($a1=10;$a1>$a;$a1--){
	echo"*";
	}
	for($a2=10;$a2>$a;$a2--){
	echo"*";
	}
	echo"<br>";
	}
	for($b=0; $b<=10;$b++){
	for($j=1;$j<=$b;$j++){
	echo"_";
	}
	for($b1=10; $b1>$b;$b1--){
	echo"*";
	}
	for($b2=10; $b2>$b;$b2--){
	echo"*";
	}
	echo"<br>";
	}

?>

</body>
</html>