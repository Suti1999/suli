<?php 
$title = "TvShop | Kezdőlap";
?>

<div class="row col-md-10 mx-auto">
    <?php
    foreach ($db->osszesTermek() as $row) {
        $image = null;
        if (file_exists("./kepek/" . $row['termek_neve'] . ".jpg")) {
            $image = "./kepek/" . $row['termek_neve'] . ".jpg";
        } else if (file_exists("./kepek/" . $row['termek_neve'] . ".jpeg")) {
            $image = "./kepek/" . $row['termek_neve'] . ".jpeg";
        } else if (file_exists("./kepek/" . $row['termek_neve'] . ".png")) {
            $image = "./kepek/" . $row['termek_neve'] . ".png";
        } else {
            $image = "./kepek/noimage.jpg";
        }
        
        $card = '<div class="card" style="width: 18rem;">
                    <img src="'.$image.'" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['termek_neve'] . '</h5>' .
                '<a href="index.php?menu=home&id=' . $row['termekid'] . '" class="btn btn-primary">Részletek</a>
                    </div>
                </div>
            ';
        echo $card;
    }
    ?>
</div>
<style>
    .card-img-top{
        widht: 200px;
        height: 200px;
    }
</style>


