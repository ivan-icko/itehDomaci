<?php
include 'konekcija.php';
include 'KnjigeClass.php';
include 'ZanrClass.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php

if (isset($_POST['zanr'])) {
  $icko = $_POST['zanr'];
}
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gaming Arena</title>

  <link href="css/bootstrap.css" rel="stylesheet">


  <link href="css/main.css" rel="stylesheet">

</head>

<body>


  <div class="navbar navbar-inverse navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Gaming Arena</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a id="btn-Pocetna" href="index.php" type="button" class="btn btn-success btn-block">Početna</a></li>
          <li><a id="btn-Dodaj" type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#my">Dodaj novu knjigu</a></li>
          <li><a id="btn-Upravljaj" href="UpravljajKnjigama.php" type="button" class="btn btn-success btn-block">Upravljaj knjigama</a></li>

        </ul>
      </div>
    </div>
  </div>

  <!-- <div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<img src="slike/sony.JPG" alt="pocetna" class="img img-circle">
                    <h1>Upravljaj Knjigama</h1>
				</div>
			</div>
	    </div>
    </div> -->


  <!-- Modal -->
  <div class="modal fade" id="my" role="dialog">
    <div class="modal-dialog">
      <!-- zakazi modal -->
      <!--Sadrzaj modala-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="container prijava-form">
            <form action="#" method="post" id="izmeniForma">


              <h3 style="color: black; text-align: center">Izmeni podatke o knjizi</h3>
              <div class="row">
                <div class="col-md-11 ">

                  <div style="display: none;" class="form-group">
                    <label for="">IdKnjige</label>
                    <input  id="idKnjige" type="text" style="border: 1px solid black" name="idKnjige" class="form-control" />
                  </div>

                  <div class="form-group" style="display: none;">
                    <label for="">IdZanraaaa</label>
                    <input id="idZanra"  type="text" style="border: 1px solid black" name="idZanra" class="form-control" />
                  </div>


                  <div class="form-group">
                    <label for="">Naziv knjige</label>
                    <input id="naziv" type="text" style="border: 1px solid black" name="naziv" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="">Autor</label>
                    <input id="autor" type="text" style="border: 1px solid black" name="autor" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="">Zanr</label>

                    <select title="zanrr" id="zanr" name="zanr" class="form-control">
                      <?php
                      $rez = $conn->query("SELECT * from zanrknjige");
                      while ($red = $rez->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $red['ZanrId'] ?>"> <?php echo $red['NazivZanra'] ?></option>
                      <?php  }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-12" style="display: none;">
                    <div class="form-group">
                      <label for="" >Datum neki</label>
                      <input type="date" style="border: 1px solid black" name="datum" class="form-control" />
                    </div>
                  </div>
                  <div class="form-group">
                    <button id="btnIzmeni" type="submit" class="btn btn-success btn-block" tyle="background-color: orange; border: 1px solid black;">Izmeni</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>

  </div>


  <div class="container pt">
    <?php

    $niz = [];
    $rez = $conn->query("select * from knjiga k join zanrknjige z on k.Zanr=z.ZanrId");

    while ($red = $rez->fetch_assoc()) {
      $Zanr = new Zanr($red['ZanrId'], $red['NazivZanra']);
      $knjiga = new Knjiga($red['IdKnjige'], $red['NazivKnjige'], $red['Autor'], $Zanr);
      array_push($niz, $knjiga);
    }
    ?>
    <p id="p">Lista svih knjiga</p>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Naziv knjige</th>
          <th>Autor knjige</th>
          <th>Zanr</th>
          <th>Obriši</th>
          <th>Izmeni</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($niz as $vrednost) {
        ?>
          <tr>
            <td style="display:none" data-target="idZanra"><?php echo $vrednost->Zanr->ZanrId?></td>
            <td data-target="naziv"><?php echo $vrednost->NazivKnjige ?> </td>
            <td data-target="autor"><?php echo $vrednost->Autor ?> </td>
            <td data-target="zanr"><?php echo $vrednost->Zanr->NazivZanra ?></td>
            <td><button id="btnObrisi" name="btnObrisi" class="btn btn-danger" data-id1="<?php echo $vrednost->IdKnjige ?>">Obriši</a></td>
            <td><button class="btn btn-info" data-toggle="modal" data-target="#my" data-id2="<?php echo $vrednost->IdKnjige ?>">Izmeni</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

  </div>

  <div id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h4>Adresa</h4>
          <p>
            Vojvode Mišića 2,<br />
            015 8950800, <br />
            Loznica, Srbija.
          </p>
        </div>

        <div class="col-lg-4">
          <h4>Društvene mreže</h4>
          <p>
            <a href="https://www.facebook.com/fon.bg.ac.rs">Facebook</a><br />
            <a href="https://twitter.com/fonbg">Twitter</a><br />
            <a href="http://plus.google.com/106390371419524147048/posts">Google+</a>
          </p>
        </div>

      </div>

    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    



</body>

</html>