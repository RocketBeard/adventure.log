<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'D0gd4yz2014!';
$DATABASE_NAME = 'users';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$sql = "SELECT id, username, content FROM content";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["content"]. "<br>";
  }
} else {
  echo "0 results";
}
$con->close();


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

		
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Jake's Portfolio Site</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
            <p>Welcome back, <?=$_SESSION['name']?>!</p>
            <p>What would you like to say?</p>
            <form action="post.php" method="post">>
            <input type ="text" name="post" placeholder="post" id="post">
            <input type="submit" value="Login">

</form>
        </div>
        <div><td>content:</td>
						<td><?=$content?></td></div>
	</body>
</html>