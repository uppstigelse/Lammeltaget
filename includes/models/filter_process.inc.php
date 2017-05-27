<?php
	include '../bootstrap.php';
	session_start();
	$filter = $_POST['filter'];
	if ($filter=='trailName'){
		$order = 'ASC';
	}
	else {
		$order = 'DESC';
	}


	$sql = "SELECT * FROM user,trail join (SELECT trail.trailID, SUM(vote) as 'rating' FROM vote,trail WHERE vote.trailID = trail.trailID group by trail.trailID) rate on trail.trailID = rate.trailID WHERE trail.userID=user.userID ORDER BY $filter $order";
	$result = mysqli_query($conn, $sql);

		while ($row = $result->fetch_assoc())  //Runs through the entire result
		{
			

			

			echo "<div id='".$row['trailName'] ."' class='trails_in_list'>"; 
			echo "<img src='assets/img/maps_icon.png' class='trail_img'><div class='trail_content_info'>";
			echo "<label id='trail_name_in_list'>" . $row['trailName'] . "</label> <br>	";
			echo "<label class='trail_list_difficulty'>Svårighet:<label>" . $row['difficultyLevel'] . "<br>";
			echo "<label class='trail_list_length'>Längd:<label>" . $row['trailLength'] . "<br>";
			echo "<label class='trail_list_username'>Skapar av: ". $row['userName'] . "<label>";
			echo "</div>";
			
			echo "<label class='trail_list_rating'>" .$row['rating'].  "</label>";
			echo "<label class='trail_list_date'>Skapad: " .$row['creationDate']. "</label>" ;
			
			echo "</div>";
		}