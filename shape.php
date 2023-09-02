<?php
  require("./Rectangle.php");

  $object1 = new Rectangle();
  
  $object1 -> length = 30;
  $object1 -> width = 20;

  echo "<p>Object 1 Area: " . $object1 -> getArea();
  echo "<p>Object 1 Perimeter: " . $object1 -> getPerimeter();
  
  $object2 = new Rectangle();

  $object2 -> length = 5;
  $object2 -> width = 18;

  echo "<p>Object 2 Area: " . $object2 -> getArea();
  echo "<p>Object 2 Perimeter: " . $object2 -> getPerimeter();

  $object3 = new Square();

  $object3 -> length = 24;
  $object3 -> width = 7;

  if ($object3 -> isSquare()) {
    echo "<p>The area of the <b>square</b> is: " . $object3 -> getArea();
  } else {
    echo "<p>The area of the <b>rectangle</b> is: " . $object3 -> getArea();
  }
?>
