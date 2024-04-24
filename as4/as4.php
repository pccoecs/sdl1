<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Search</title>
 </head>
 <body>
 <?php

 $employee_names = array(
    "John",
    "Jane",
    "Michael",
    "Emily",
    "David",
    "Sophia",
    "William",
    "Olivia",
    "Daniel",
    "Emma",
    "Matthew",
    "Ava",
    "Christopher",
    "Mia",
    "Andrew",
    "Ella",
    "James",
    "Grace",
    "Logan",
    "Lily"
 );

 if (isset($_GET['search_name'])) {
    $search_name = $_GET['search_name'];
    $result = in_array($search_name, $employee_names);
    if ($result) {
        echo "<p>{$search_name} is an employee.</p>";
    } else {
        echo "<p>{$search_name} is not found in the list of employees.</p>";
    }
}
 ?>
 
 <form method="GET" action="">
    <label for="search_name">Enter employee name:</label>
    <input type="text" name="search_name" id="search_name" required>
    <button type="submit">Search</button>
 </form>
 </body>
 </html>