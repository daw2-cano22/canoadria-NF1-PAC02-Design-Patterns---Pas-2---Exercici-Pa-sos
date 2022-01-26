<html>
<body>
<head>
</head>
<?php
abstract class AbstractConstruccion {
  
 
  private $contrucciones = array();
  private $name;
  private $superficie;
  public $contador=0;
  public function add(AbstractConstruccion  $contrucciones) {
     array_push($this->contrucciones, $contrucciones);
  }
  
  public function remove(AbstractConstruccion  $contrucciones) {
     array_pop($this->contrucciones);
  }
        
  public function hasChildren() {
    return (bool)(count($this->contrucciones) > 0);
  }
    
  public function getChild($i) {
    return $this->contrucciones[i];
  }
    
  public function getDescription() {
    echo "- one " . $this->getName();
    echo "- one " . $this->getSuperficie();
    if ($this->hasChildren()) {
      echo " which includes:<br>";
      foreach($this->contrucciones as $contrucciones) {
         echo "<table cellspacing=5 border=0><tr><td>&nbsp;&nbsp;&nbsp;</td><td>-";
         $contrucciones->getDescription();
          //$contador=$contador+$construcciones->getSuperficie();
         echo "</td></tr></table>";
      
      }        
    }
  }
  
 public function setName($name) {
   $this->name = $name;
 }
  
 public function getName() {
   return $this->name;
 }
         
 public function setSuperficie($superficie) {
    $this->superficie = $superficie;
 }

 public function getSuperficie() {
   return $this->superficie;
  }
  public function sumar(){
     $suma=$this->getSuperficie();
 foreach($this->contrucciones as $contrucciones) {
  
        $suma =$suma+$contrucciones->sumar();
      }  
     return $suma;
  }
}

class Continent extends AbstractConstruccion {
  function __construct($name) {
    parent::setName($name);
    parent::setSuperficie(34);
  }      
}

class Pais extends AbstractConstruccion {
  function __construct($name) {
   parent::setName($name);
   parent::setSuperficie(23);
  }
}

class Ciudad extends AbstractConstruccion {
  function __construct($name) {
    parent::setName($name);
    parent::setSuperficie(45);
  }
}

class BaseDrum extends AbstractConstruccion {
  function __construct($name) {
    parent::setName($name);
    parent::setCategory("base drums");
  }
}

class Cymbal extends AbstractConstruccion {
  function __construct($name) {
    parent::setName($name);
    parent::setCategory(55);
  }
}


$Continent = new Continent("World");
$Continent->add(new Pais("España"));
$Continent->add(new Ciudad("Barcelona"));
$Continent->add(new Ciudad("Girona"));

$Continent = new Continent("Europeo");
$Pais = new Pais("España");
$Pais->add(new Pais("Barcelona"));
$Pais->add(new Pais("Girona"));

$Continent->add($Pais);
$Continent->add($Pais);




echo "List of World: <p>";

$Continent->getDescription();
$Pais->getDescription();
echo $Continent->sumar();

?>

</body>
</html>
