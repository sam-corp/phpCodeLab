<?php
  include_once('../connectdb.php');

  switch ($_POST['action']) {
    case 'new':
        $vehicle = new Vehicle();
        $vehicle->setMarque($_POST['marque']);
        $vehicle->setCode($_POST['code']);
        $vehicle->setCouleur($_POST['couleur']);
        $vehicle->create($bdd);

        $vehicle->displayMod();

      break;

    case 'update':

        $vehicle = new Vehicle();
        $vehicle->setId($_POST['id']);
        $vehicle->setMarque($_POST['marque']);
        $vehicle->setCouleur($_POST['couleur']);
        $vehicle->setCode($_POST['code']);

        $vehicle->update($bdd);

        $vehicle->displayMod();

      break;

    case 'delete':
        Vehicle::DELETE($bdd, $_POST['id']);
      break;

    case 'list':
        foreach(Vehicle::getAll($bdd) as $vehicle){
          $vehicle->displayMod();
        }
      break;

    case 'read':
        foreach(Vehicle::getAll($bdd) as $vehicle){
          $vehicle->display();
        }
      break;



  }




 ?>
