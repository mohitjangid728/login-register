<?php 
	session_start();

	// variable declaration
	$firstname = "";
	$lastname = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'shop');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$firstname = mysqli_real_escape_string($db, $_POST['firstName']);
		$lastname = mysqli_real_escape_string($db, $_POST['lastName']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		// form validation: ensure that the form is correctly filled
		if (empty($firstname)) { array_push($errors, "Firstname is required"); }
		if (empty($lastname)) { array_push($errors, "Lastname is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }

		//email check
		$checkquery = "SELECT * FROM users WHERE email='$email'";
		$emailcheck = mysqli_query($db, $checkquery);
		if (mysqli_num_rows($emailcheck) >= 1) {
			array_push($errors, "User is already registered");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);//encrypt the password before saving in the database
			$query = "INSERT INTO users (firstname, lastname, email, password) 
					  VALUES('$firstname', '$lastname', '$email', '$password')";
			mysqli_query($db, $query);
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email'] = $email;
				$detailquery = "SELECT * FROM users WHERE email='$email' AND password='$password'";
				if ($results = mysqli_query($db,$detailquery)) {
					$query_exe = mysqli_fetch_assoc($results);
					$firstname = $query_exe['firstname'];
					$lastname = $query_exe['lastname'];
					$_SESSION['firstname'] = $firstname;
					$_SESSION['lastname'] = $lastname;
					$_SESSION['success'] = "You are now logged in";
					header('location: index.php');
				}
			}else {
				array_push($errors, "Wrong email or password");
			}
		}
	}

	

?>