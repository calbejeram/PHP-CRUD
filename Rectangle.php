<?php
  class Rectangle {
    public $length = 0;
    public $width = 0;

    public function getArea() {
      return ($this -> length) * ($this -> width);
    }

    public function getPerimeter() {
      return 2 * (($this -> length ) + ($this -> width ));
    }
  }

  // Inheriting the values through extending the Class
  class Square extends Rectangle {
    public function isSquare() {
      if ($this -> length == $this -> width) {
        return true;
      } else {
        return false;
      }
    }
  };
?>