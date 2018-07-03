<?php 

	$day8 = ['Ian', 'Kevin', 'Larry', 'Sian', 'Huge'];
	$day9 = ['Glen', 'Paul', 'Judy', 'Vonn', 'Ju'];
	
	$name = $_POST['name'];

	if(in_array($name,$day8)){
		echo "Nasa Day 8.";
	}
	elseif(in_array($name, $day9)){
		echo "Nasa Day 9.";
	}
	elseif {
		echo "Wala sa Tuitt";
	}
 ?>