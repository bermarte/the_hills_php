<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['logged'])) {
    header('Location: login.php');
}

$limit = 50;
/** @noinspection SqlResolve */
$stmt = openConnection()->prepare("SELECT * FROM student LIMIT :limit");
$stmt->execute(['limit' => $limit]);
$data = $stmt->fetchAll();

if (isset($_POST['insert'])){
    header('Location: insert.php');
    return;
}
if (isset($_POST['exit'])){
    session_destroy();
    header('Location: login.php');
    return;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap-4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1 class="text-center">Home</h1>
    <div class="mt-5 mb-5">
    <table class="table table-bordered table-hover">
        <caption>List of users</caption>
    <?php
    echo "<thead class=\"thead-light\">
    <tr>
      <th scope=\"col\">#</th>
      <th scope=\"col\">First-name</th>
      <th scope=\"col\">Last-name</th>
      <th scope=\"col\">Email</th>
      <th scope=\"col\">Language</th>
      <th scope=\"col\">Profile</th>
    </tr>
  </thead>
  <tbody>";
    $count = 0;
    foreach ($data as $row) {
        echo "<tr>\n";
        echo "<td>".++$count."</td>"."<td>".$row['first_name']."</td>"."<td>".$row['last_name']."</td>".
            "<td>".$row['email']."</td>".
            "<td>".$row['preferred_language']."</td>".
              "<td><a href=\"profile.php?user=".$row['id']."\">Profile</a></td>";

        echo "</tr>\n";
    }

    ?>
    </table>
    <form action="" method="post">
        <div class="row">

            <div class="form-group col-sm text-center">
                <div class="btn-group">
                    <input type="submit" name="insert" value="insert record" class="btn btn-primary">
                    <input type="submit" name="exit" value="exit" class="btn btn-primary">
                </div>
            </div>
    </form>
</div>
</body>
</html>
