<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--    <link rel="stylesheet" type="text/css" href="..\..\public\styles\styles.css">-->

</head>
<body class="container-fullwidth" style="background-color:white">

<nav class="navbar  navbar-toggleable navbar-light">
    <a class="navbar-brand" href="\admin">AppTest Admin</a>


        <ul class="navbar-nav nav">
            <li class="nav-item ">
                <a href="/admin/question">All Questions</a><br/><br/>
            </li>
            <li class="nav-item ">
                <a href="/admin/answer">All Answers</a><br/><br/>
            </li>

        </ul>
        <ul class="nav navbar-nav navbar-right " style="margin-right: 15px;">
            <?php if(!empty($_SESSION['USER'])){ ?>
                    <li class="nav-item">
                        <a href="#" type="submit" name="logout"> User : <?=$_SESSION['USER']?></a>
                    </li>
                    <li class="nav-item">
                        <a href="\admin\main\logout" type="submit" name="logout">Log Out</a>
                    </li>

            <?php }?>

        </ul>


</nav>


    <div  class="container">
        <?=$content?>
    </div>
<!-- // add logout in head menu -->



</body>
</html>
