<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Calculator</title>
</head>
<style>
    body{
        background-color: peachpuff;
        font-family: 'Times New Roman';
        font-size: 16;
        align-items: center;
        margin: 0;
        padding: 0;
        justify-content: center;
    }
    form{
        align-items: center;
    }
    </style>
    
<body>
    <form action="" method="GET">
        <h1> Calculate Area </h1>
        <h2> For Triangle </h2>
        <label for="height">Enter Height of Triangle: </label>
        <input type="text" id="height" name="height"><br>
        <label for="base">Enter Base of Triangle: </label>
        <input type="text" id="base" name="base"> <br>
        <p> <input type="radio" name="shape" value="Triangle"> Triangle </p><br>

        <h2> For Circle and Square </h2>
        <label for="side">Enter Radius(for circle) or Side(for rectangle): </label>
        <input type="text" id="side" name="side"><br>
        <p> <input type="radio" name="shape" value="circle"> Circle </p>
        <p> <input type="radio" name="shape" value="rectangle"> Rectangle </p><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if (isset($_GET["shape"])) {
        define("pi", 3.14);

        interface shape {
            function calcu_area($r, $h);
        }

        class triangle implements shape {
            var $height;
            var $base;

            function calcu_area($height, $base) {
                return 0.5 * $height * $base;
            }
        }
        class circle implements shape {
            var $radius;

            function calcu_area($r, $h = null) {
                return pi * $r * $r;
            }
        }
        class rectangle implements shape {
            var $side;

            function calcu_area($side, $h = null) {
                return $side * $side;
            }
        }
        $selectedShape = $_GET["shape"];
        switch ($selectedShape) {
            case "Triangle":
                $height = $_GET['height'];
                $base = $_GET['base'];
                $obj = new triangle();
                $area = $obj->calcu_area($height, $base);
                echo "Area of Triangle is: $area <br> ";
                break;
            case "circle":
                $radius = $_GET['side'];
                $obj = new circle();
                $area = $obj->calcu_area($radius);
                echo "Area of Circle is: $area <br> ";
                break;
            case "rectangle":
                $side = $_GET['side'];
                $obj = new rectangle();
                $area = $obj->calcu_area($side);
                echo "Area of Rectangle is: $area <br> ";
                break;
            default:
                echo "Invalid Input";
        }
    }
    ?>
</body>
</html>
