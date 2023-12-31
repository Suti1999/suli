<?php
// Az oldal címének beállítása a kívánt oldalon
$page_title = "TV Webshop";
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
    if ($menu === 'rolunk') {
        $page_title .= " | Rólunk";
    } elseif ($menu === 'login') {
        $page_title .= " | Belépés";
    } 
    elseif ($menu === 'regisztracio') {
        $page_title .= " | Regisztráció";
    } 
}
?>


<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
         <title><?php echo $page_title; ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" integrity="sha512-72OVeAaPeV8n3BdZj7hOkaPSEk/uwpDkaGyP4W2jSzAC8tfiO4LMEDWoL3uFp5mcZu+8Eehb4GhZWFwvrss69Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js" integrity="sha512-Sct/LCTfkoqr7upmX9VZKEzXuRk5YulFoDTunGapYJdlCwA+Rl4RhgcPCLf7awTNLmIVrszTPNUFu4MSesep5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="./layout/tvshop.css"/>
    </head>
