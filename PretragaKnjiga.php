<?php
    include 'konekcija.php';
    include 'KnjigeClass.php';

    if(isset($_GET['ZanrId']))
    {
        $id = mysqli_real_escape_string($conn,$_GET['ZanrId']);
        $niz = [];
        $rez = $conn->query("select * from knjiga where Zanr=$id");
       // $rez = $conn->query("select * from knjiga where Zanr=$id") or die($conn->error);
        while($red=$rez->fetch_assoc()):
            
        $knjige = new Knjiga($red['IdKnjige'],$red['NazivKnjige'],$red['Autor'],$id);
        array_push($niz,$knjige);
        endwhile;
    ?>
    <table class="table table-hover" >
    <thead>
        <tr>
            <th scope="col">Naziv knjige</th>
            <th scope="col">Autor knjige</th>
        </tr>
    </thead>
    <tbody>
        <?php echo "<br>"?>
        <?php echo "<br>"?>
        <?php echo "<br>"?>
        <?php echo "<br>"?>
        <?php
        foreach($niz as $vrednost):
            ?>
                <tr>
                   
                <td> <?php echo $vrednost->NazivKnjige  ?></td>
                
              <td><?php echo $vrednost->Autor ?>  </td>
              
                </tr>
            <?php
        endforeach;
        ?>
    </tbody>
    </table>
    <?php
    }else{
    echo("Molimo vas da prosledite zanr za koji želite knjige.");
    }
 ?>