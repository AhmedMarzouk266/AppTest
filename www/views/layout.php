<!DOCTIPE html>
<html lang="en">
<head>
    <title>Layout page</title>

    <link rel="stylesheet" type="text/css" href="..\public\styles\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="..\public\styles\styles.css">


    <!--General layout for everything-->
</head>

<!---->
<!---->

<body class="container-fullwidth">

<nav class="navbar  navbar-toggleable navbar-light" style="background-color: lightskyblue;">
    <a class="navbar-brand" href="#">AppTest</a>

    <div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/test">Tests</a>
            </li>
        </ul>
    </div>

</nav>

<div class="container">

    <?php
        echo $content;
    ?>
</div>

<script src="..\public\javascripts\bootstrap.min.js"></script>
<script src="..\public\javascripts\jquery-3.2.1.min.js"></script>
<script src="..\public\javascripts\scripts.js"></script>

</body>
</html>

