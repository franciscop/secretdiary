<h1>Test</h1>
<?php

interface Model {
  public function getArea();
  }

class Square implements Shape {
  public function __construct($side) {
    $this->side = $side;
    }
  
  public function getArea() {
    return $this->side * $this->side;
    }
  }

class Price {
  public function getPrice (Shape $Shape) {
    return $Shape->getArea() * 0.5;
    }
  }

$Square = new Square("2");
$Price = new Price();
?>

The item you selected has an area of <?= $Square->getArea(); ?> and costs $<?= $Price->getPrice($Square); ?>
