<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— Blog —</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/" class="logo">Blog</a>
            <?php
                if (!isset($_SESSION["user"]["username"])) {
                    ?>
                        <div class="hoverLink">
                            <a href="/" class="icon"><i class="fas fa-home"></i></a>
                            <p class="hidden">Accueil</p>
                        </div>

                        <div class="hoverLink">
                            <a href="/login" class="icon"><i class="fas fa-user-tie"></i></a>
                            <p class="hidden">Login</p>
                        </div>

                        <div class="hoverLink">
                            <a href="/dashboard" class="icon"><i class="fas fa-list-alt"></i></a>
                            <p class="hidden">Blog</p>
                        </div>
                    <?php
                } else {
                    ?>
                        <div class="hoverLink">
                            <a href="/" class="icon"><i class="fas fa-home"></i></a>
                            <p class="hidden">Accueil</p>
                        </div>

                        <div class="hoverLink">
                            <p class="icon"><i class="fas fa-user"></i></p>
                            <p class="hidden"><?php echo $_SESSION["user"]["username"]; ?></p>
                        </div>

                        <div class="hoverLink">
                            <a href="/dashboard" class="icon"><i class="fas fa-list-alt"></i></a>
                            <p class="hidden">Blog</p>
                        </div>

                        <div class="hoverLink">
                            <a href="/dashboard/nouveau" class="icon"><i class="fas fa-plus"></i></a>
                            <p class="hidden">New article</p>
                        </div>

                        <div class="hoverLink">
                            <a href="/logout" class="icon"><i class="fas fa-power-off"></i></a>
                            <p class="hidden">Logout</p>
                        </div>
                       <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"]==1) { ?>
                            <div class="hoverLink">
                                <a href="/register" class="icon"><i class="fas fa-users"></i></a>
                                <p class="hidden">New user</p>
                            </div>
                        <?php
                            }
                        ?>
                    <?php
                }
            ?>
            <div id="meteo">
                <p class="lieu-meteo"></p>
                <p class="temperature-meteo"></p>
                <img class="icon-meteo" src="" alt="icone meteoroligique">
            </div>
        </nav>
        
    </header>

    <main>
        <?php echo $content; ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/openWeather.js"></script>
    <script src="/js/comments.js"></script>

</body>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
