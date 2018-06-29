<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </head>
  <body class="grey darken-3 white-text">
    <header class="row">
      <center><h3>PHP CODELAB</h3></center>
    </header>
    <div class="row">
      <div class="col l10 offset-l1 m12 s12">



        <div class="col m12 menu purple darken-3 white-text z-depth-1">
          <div class="col m3 l1 elm menuELRead waves-effect waves-light" data=".reading" data-body=".listVehicleRead">
            LISTER
          </div>
          <div class="col m3 l1 elm menuELList waves-effect waves-light" data=".manage" data-body=".listVehicle">
            GERER
          </div>
        </div>

        <div class="col m12 s12 manage zone">
          <div class="col m6 s12">
            <font class="flow-text col m12">Création</font>

            <form class="col m12 s12 formVehicle">
              <input type="hidden" name="action" value="new" id="ACTION">
              <input type="hidden" name="id" id="ID">
              <div class="input-field">
                <input type="text" name="marque" id="Vmar" required>
                <label for="Vmar">Marque</label>
              </div>

              <div class="input-field">
                <input type="text" name="code" id="Vnom" required>
                <label for="Vnom">Code</label>
              </div>

              <div class="input-field">
                <input type="text" name="couleur" id="Vcol" required>
                <label for="Vcol">Couleur</label>
              </div>

              <div class="col m12 s12">
                <input type="submit" value="AJOUTER" class="btn waves-effect purple darken-3">
              </div>

            </form>

          </div>

          <div class="col m6 s12">
            <table class="responsive-table">
              <th>Marque</th>
              <th>Code</th>
              <th>Couleur</th>
              <th>Action</th>
              <tbody class="listVehicle">

              </tbody>
            </table>
          </div>

        </div>

        <div class="col m12 s12 reading zone" style="display: none;">
          <div class="col m6 offset-m3 s12">
            <font class="col m12 flow-text">LECTURE</font>
            <table class="responsive-table">
              <th>Marque</th>
              <th>Code</th>
              <th>Couleur</th>
              <tbody class="listVehicleRead">

              </tbody>
            </table>
          </div>
        </div>



      </div>
    </div>

    <script type="text/javascript" src="js/home.js"></script>

    <style media="screen">
      .elm{line-height: 40px;}
    </style>

  </body>
</html>
