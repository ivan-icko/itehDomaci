<?php
include 'konekcija.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tvoja biblioteka</title>

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
                <a class="navbar-brand" href="index.php">Tvoja bibioteka</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a id="btn-Pocetna" href="index.php" type="button" class="btn btn-success btn-block">Početna</a></li>
                    <li><a id="btn-Dodaj" type="button" class="btn btn-success btn-block"  data-toggle="modal" data-target="#my">Dodaj novu knjigu</a></li>
                    <li><a id="btn-Upravljaj" href="UpravljajKnjigama.php" type="button" class="btn btn-success btn-block">Upravljaj knjigama</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <img src="slike/slika.webp" alt="pocetna" class="img img-circle">
                    <h1>Dobri prijatelji, dobre knjige i čista savest: to je idealan život. – Mark Tven</p>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="my" role="dialog">
        <div class="modal-dialog">
            
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container prijava-form">
                        <form action="#" method="post" id="dodajForm">
                            <h3 style="color: black; text-align: center">Dodaj novu knjigu</h3>
                            <div class="row">
                                <div class="col-md-11 ">
                                    <div class="form-group">
                                        <label for="">Naziv knjige</label>
                                        <input type="text" style="border: 1px solid black" name="naziv" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Autor</label>
                                        <input type="text" style="border: 1px solid black" name="autor" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <select id="zanr" name="zanr" class="form-control">
                                            <?php
                                            $rez = $conn->query("SELECT * from zanrknjige");
                                            while ($red = $rez->fetch_assoc()) {
                                            ?>
                                                <option name="value" value="<?php echo $red['ZanrId'] ?>"> <?php echo $red['NazivZanra'] ?></option>
                                            <?php  }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12" style="display: none;">
                                        <div class="form-group">
                                            <label for="">Datum neki</label>
                                            <input type="date" style="border: 1px solid black" name="datum" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button id="btnDodaj" type="submit" class="btn btn-success btn-block" tyle="background-color: orange; border: 1px solid black;">Dodaj</button>
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
        <label for="pretraga">Pretraži knjige za odabrani žanr</label>
        <select id="pretraga" onchange="pretraga()" class="form-control">
            <?php
            $rez = $conn->query("SELECT * from zanrknjige");
            while ($red = $rez->fetch_assoc()) {
            ?>
                <option value="<?php echo $red['ZanrId'] ?>"> <?php echo $red['NazivZanra'] ?></option>
            <?php   }
            ?>
        </select>
        <div id="podaciPretraga"></div>
    </div>

    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4>Adresa</h4>
                    <p>
                        Milana Rakica 77,<br />
                        0655417876, <br />
                        Beograd, Srbija.
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
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function pretraga() {
            $.ajax({
                url: "PretragaKnjiga.php",
                data: {
                    ZanrId: $("#pretraga").val()
                },
                success: function(html) {
                    $("#podaciPretraga").html(html);
                }
            })
        }
    </script>
    <script>
        pretraga();
    </script>
</body>

</html>