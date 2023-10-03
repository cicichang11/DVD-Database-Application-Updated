<?php
	// Check to see if any required fields are missing.
	if ( !isset($_POST['title']) || trim($_POST['title']) == ''
		|| !isset($_POST['dvd_title_id']) || trim($_POST['dvd_title_id']) == '') {
		// One or more of the required fields is empty.
		$error = "Please fill out the required field.";
	} else {
		// All required fields provided. Continue with the ADD workflow.
		$host = "303.itpwebdev.com";
		$user = "cicichan_db_user";
		$pass = "Heyitscicinn0411/";
		$db = "cicichan_dvd_db";

		// DB Connection.
		$mysqli = new mysqli($host, $user, $pass, $db);
		if ( $mysqli->connect_errno ) {
			echo $mysqli->connect_error;
			exit();
		}
		// special character 
		$mysqli->set_charset('utf8');

		$dvd_title_id = $_POST['dvd_title_id'];
		$title = $_POST['title'];


		// label
		if (isset($_POST['label']) && trim($_POST['label']) != '') {
			$label_id = $_POST['label'];
		} else {
			$label_id = "null";
		}
		// sound
		if (isset($_POST['sound']) && trim($_POST['sound']) != '') {
			$sound_id = $_POST['sound'];
		} else {
			$sound_id = "null";
		}
		// genre
		if (isset($_POST['genre']) && trim($_POST['genre']) != '') {
			$genre_id = $_POST['genre'];
		} else {
			$genre_id = "null";
		}
		// rating
		if (isset($_POST['rating']) && trim($_POST['rating']) != '') {
			$rating_id = $_POST['rating'];
		} else {
			$rating_id = "null";
		}
		// format
		if (isset($_POST['format']) && trim($_POST['format']) != '') {
			$format_id = $_POST['format'];
		} else {
			$format_id = "null";
		}
		// award
		if (isset($_POST['award']) && trim($_POST['award']) != '') {
			$award = $_POST['award'];
		} else {
			$award = "null";
		}
		// release_date
		if ( isset($_POST['release_date']) && trim($_POST['release_date']) != '' ) {
			$release_date = $_POST['release_date'];
		} else {
			$release_date = "null";
		}

		//sql
		// release date
		if($release_date != "null"){
			if($award != "null"){
				$sql = "UPDATE dvd_titles
						SET title = '$title',
							award = 'award',
							release_date = '$release_date',
							label_id = $label_id,
							sound_id = $sound_id,
							genre_id = $genre_id,
							rating_id = $rating_id,
							format_id = $format_id
						WHERE dvd_title_id = $dvd_title_id;";
						
			} else{
				$sql = "UPDATE dvd_titles
						SET title = '$title',
							release_date = '$release_date',
							label_id = $label_id,
							sound_id = $sound_id,
							genre_id = $genre_id,
							rating_id = $rating_id,
							format_id = $format_id
						WHERE dvd_title_id = $dvd_title_id;";
			}
		} else{
			if($award != "null"){
				$sql = "UPDATE dvd_titles
						SET title = '$title',
							award = 'award',
							label_id = $label_id,
							sound_id = $sound_id,
							genre_id = $genre_id,
							rating_id = $rating_id,
							format_id = $format_id
						WHERE dvd_title_id = $dvd_title_id;";
						
			} else{
				$sql = "UPDATE dvd_titles
						SET title = '$title',
							label_id = $label_id,
							sound_id = $sound_id,
							genre_id = $genre_id,
							rating_id = $rating_id,
							format_id = $format_id
						WHERE dvd_title_id = $dvd_title_id;";
			}
		}


		$results = $mysqli->query($sql);

		if (!$results) {
			echo $mysqli->error;
			$mysqli->close();
			exit();
		}


		// echo "<pre>";
		// echo $sql;
		// echo "</pre>";


		$mysqli->close();
		
	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Confirmation | DVD Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="search_form.php">Search</a></li>
		<li class="breadcrumb-item"><a href="search_results.php">Results</a></li>
		<li class="breadcrumb-item"><a href="details.php?dvd_title_id=<?php echo $dvd_title_id; ?>">Details</a></li>
		<li class="breadcrumb-item"><a href="edit_form.php?dvd_title_id=<?php echo $dvd_title_id; ?>">Edit</a></li>
		<li class="breadcrumb-item active">Confirmation</li>
	</ol>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Edit a DVD</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">

				<?php if ( isset($error) && !empty($error)) : ?>

					<div class="text-danger font-italic"><?php echo $error; ?></div>

				<?php else : ?>

					<div class="text-success"><span class="font-italic"><?php echo $title; ?></span> was successfully edited.</div>

				<?php endif; ?>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="details.php?dvd_title_id=<?php echo $dvd_title_id; ?>" role="button" class="btn btn-primary">Back to Details</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</body>
</html>