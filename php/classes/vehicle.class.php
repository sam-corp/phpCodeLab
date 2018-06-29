<?php

  class Vehicle{
    private $id, $marque, $code, $couleur;

    public function __construct(){}

    public function getId(){return $this->id;}
    public function setId($i){$this->id=$i;}

    public function getMarque(){return $this->marque;}
    public function setMarque($i){$this->marque=$i;}

    public function getCode(){return $this->code;}
    public function setCode($i){$this->code=$i;}

    public function getCouleur(){return $this->couleur;}
    public function setCouleur($i){$this->couleur=$i;}

    public function last($bdd){
      $r = $bdd->query('SELECT MAX(id) as last FROM vehicle');
      $d = $r->fetch();
      return $d['last'];
    }

    public function hydrate(array $d){
      foreach ($d as $key => $value) {
        $func = 'set'.ucFirst($key);
        if(method_exists($this, $func)){
          $this->$func($value);
        }
      }
    }

    public function create($bdd){
      $r = $bdd->prepare('INSERT INTO vehicle(marque, code, couleur) VALUES(:marque, :code, :couleur)');
      $r->execute(array(
        ':marque'=>$this->marque,
        ':code'=>$this->code,
        ':couleur'=>$this->couleur
      ));

      $this->id = $this->last($bdd);
    }

    public function update($bdd){
      $r = $bdd->prepare('UPDATE vehicle SET marque=:marque, code=:code, couleur=:couleur WHERE id=:id');
      $r->execute(array(
        ':marque'=>$this->marque,
        ':code'=>$this->code,
        ':couleur'=>$this->couleur,
        ':id'=>$this->id
      ));
    }

    public static function DELETE($bdd, $id){
      $r=$bdd->prepare('UPDATE vehicle SET visible=0 WHERE id=?');
      $r->execute(array($id));
    }

    public function read($bdd){
      $r = $bdd->prepare('SELECT * FROM vehicle WHERE id=? AND visible=1');
      $r->execute(array($this->id));

      $d = $r->fetch();

      $this->hydrate($d);
    }

    public static function getAll($bdd){
      $r=$bdd->query('SELECT * FROM vehicle WHERE visible=1');

      $array = array();

      while($data = $r->fetch()){
        $vehicle = new Vehicle();
        $vehicle->hydrate($data);
        array_push($array, $vehicle);
      }

      return $array;
    }

    public function displayMod(){
      echo '<tr class="vh'.$this->getId().'">
        <td class="marque">'.$this->getMarque().'</td>
        <td class="code">'.$this->getCode().'</td>
        <td class="couleur">'.$this->getCouleur().'</td>
          <td>
            <button class="btn-floating waves-effect blue" onClick="setUpdate('.$this->getId().');">U</button>
            <button class="btn-floating waves-effect red" onClick="setDelete('.$this->getId().');">D</button>
          </td>
        </tr>';

    }

    public function display(){
      echo '<tr class="vh"'.$this->getId().'>
          <td>'.$this->getMarque().'</td>
          <td>'.$this->getCode().'</td>
          <td>'.$this->getCouleur().'</td>
        </tr>';
    }

  }

?>
