<div class="fejlec">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <div class="header-center">
            <div class="row">
                <div class="col">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($menu == 'home' ? 'active' : ''); ?>" aria-current="<?php echo ($menu == 'home' ? 'page' : ''); ?>" href="index.php?menu=home">Kezdőlap</a>
                    </li>
                </div>
                <div class="col">
                    
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($menu == 'rolunk' ? 'active' : ''); ?>" href="index.php?menu=rolunk">Rólunk</a>
                    </li>
                </div>
                <?php
                if ($_SESSION['login']) {
                    echo '<div class="col">
                            <li class="nav-item">
                                <a class="nav-link' . ($menu == 'logout' ? ' active' : '') . '" href="index.php?menu=logout">Kilépés</a>
                            </li>
                        </div>';
                } else {
                    echo '<div class="col">
                        <li class="nav-item">
                            <a class="nav-link' . ($menu == 'login' ? ' active' : '') . '" href="index.php?menu=login">Belépés</a>
                        </li>
                    </div>
                    <div class="col">
                        <li class="nav-item">
                            <a class="nav-link' . ($menu == 'regisztracio' ? ' active' : '') . '" href="index.php?menu=regisztracio">Regisztráció</a>
                        </li>
                    </div>';
                }
                ?>
            </div>
        </div>
    </ul>
</div>

