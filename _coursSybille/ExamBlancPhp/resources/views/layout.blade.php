

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OKBoomer</title>
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <script src="https://kit.fontawesome.com/6a771afa96.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<!-- header -->
<header>
    <div class="head-container container">
        <div class="img-header">
            <img src="{{asset('img/BackgroundBoomers.jpg')}}" alt="personnes agés faisant des courses">
        </div>
        <div class="head-titles">
            <h1>OK,<span class="red-title">Boomer</span>!</h1>
            <p class="uppcase">Le guide ultime pour comprendre et utiliser (ou pas) ce mème correctement</p>
        </div>
        <nav>
            <?php
            if (isset($_SESSION['user'])){
            ?>
            <a href="{{route('user.disconnect')}}">se déconnecter</a>
            <a href="{{route('articles.create')}}">créer un article</a>
            <?php
            /*if ($_SESSION['user']['role_id'] >= 2){

            }*/
            ?>

            <?php
            }else{
            ?>
            <a href="{{route('user.login')}}">s'identifier</a>
            <?php
            }
            ?>


        </nav>
    </div>
</header>

<div>
    @yield('content')
</div>


<!-- footer -->
<footer>
    <p>Site réalisé par EDEN School. L'école Digitale Et Numérique pour les moins de 18 ans.</p>
</footer>
<!-- /footer -->

</body>
</html>
