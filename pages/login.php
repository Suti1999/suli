<?php
if (filter_input(INPUT_POST,
                'belepesiAdatok',
                FILTER_VALIDATE_BOOLEAN,
                FILTER_NULL_ON_FAILURE)) {
    //-- A kapott adatok feldolgozása    
    $username = htmlspecialchars(filter_input(INPUT_POST, 'username'));
    $password = htmlspecialchars(filter_input(INPUT_POST, 'InputPassword'));

    if ($db->login($username, $password)) {
        
        $_SESSION['login'] = true;
    }
}
?>
<div class="container">
    <form action="#" method="post">
        <div class="mb-3">
            <label for="username" class="form-label login-form-text">Felhasználó név</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-label login-form-text" >Ne adja meg másnak a saját felhasználó nevét!</div>
        </div>
        <div class="mb-3">
            <label for="InputPassword" class="form-label login-form-text">Jelszó</label>
            <input type="password" class="form-control" id="InputPassword" name="InputPassword">
            <div id="emailHelp" class="form-label login-form-text">Ne adja meg másnak a saját jelszavát!</div>
        </div>

        <button type="submit" class="btn btn-primary" name="belepesiAdatok" value="true">Belépés</button>
    </form>
</div>
