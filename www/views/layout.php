<!DOCTIPE html>
<html lang="en">
<head>
    <title>Layout page</title>

    <link rel="stylesheet" type="text/css" href="..\public\styles\bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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


<script src="..\public\javascripts\scripts.js"></script>

</body>
</html>

