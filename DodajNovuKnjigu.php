<?php
 include 'konekcija.php';
 include 'KnjigeClass.php';


 $porukaUspesnosti = "";

 if(isset($_POST['sacuvajKnjigu'])){
   $nazivKnjige = trim($_POST['nazivKnjige']);
   $autor = trim($_POST['autor']);
   $zanr = trim($_POST['zanr']);

   $knjiga = new Knjiga(-1,$nazivKnjige,$autor,$zanr);
   if($knjiga->save($conn)){
      $porukaUspesnosti = "Uspešno ste uneli novu knjigu";
   }else{
     $porukaUspesnosti = "Nažalost, došlo je od greške, pokušajte ponovo! ";
   }
 }

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Knjiga razbibriga</title>

    <link href="css/bootstrap.css" rel="stylesheet">


    <link href="css/main.css" rel="stylesheet">


  </head>

  <body>
    <div id="header"></div>

    <div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<img src="slike/arena1.jpg" alt="arena" class="img img-circle">
                    <h1>Dodaj novu knjigu</h1>
				</div>
			</div>
	    </div>
    </div>



	<div class="container pt">
    <form action="" method="POST">
      <label for="nazivKnjige">Naziv knjigeeeeeeee</label>
      <input type="text" name="nazivKnjige" class="form-control" placehodler="Unesite knjigu" required>
      <label for="autor">Autor</label>
      <input type="text" name="autor" class="form-control" placehodler="Unesite autora knjige" required>
      <label for="zanr">Zanr</label>
      <select id="zanr" name="zanr" class="form-control">
        <?php
            $rez = $conn->query("SELECT * from zanrknjige");
            while($red = $rez->fetch_assoc()){
              ?>
            <option value="<?php echo $red['ZanrId'] ?>"> <?php echo $red['NazivZanra'] ?></option>
          <?php  }
              ?>
      </select>
      <label for="sacuvajKnjigu"></label>
      <input id="sacuvajKnjigu" type="submit" name="sacuvajKnjigu" class="form-control btn-primary" value="Sačuvaj knjigu">
  </form>
  <h3><?php echo $porukaUspesnosti ?> </h3>
	</div>
    <div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>Adresa</h4>
					<p>
          Milana Rakica 77,<br/>
						015 8950800, <br/>
						Beograd, Srbija.
					</p>
				</div>

				<div class="col-lg-4">
					<h4>Društvene mreže</h4>
					<p>
						<a href="https://www.facebook.com/fon.bg.ac.rs">Facebook</a><br/>
						<a href="https://twitter.com/fonbg">Twitter</a><br/>
						<a href="http://plus.google.com/106390371419524147048/posts">Google+</a>
					</p>
				</div>

			</div>

		</div>

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
    function header(){
      $.ajax({
        url: "header.php",
        success: function(html){
          $("#header").html(html);
        }
      })
    }
    </script>
    <script>
    header();
    </script>
  </body>
</html>
