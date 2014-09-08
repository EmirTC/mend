<?php
    include_once('db.php');

    $query  = "SELECT * from imagenes order by id desc";
    $res    = mysql_query($query);
    $count  =   mysql_num_rows($res);
    $slides='';
    $Indicators='';
    $counter=0;

    while($row=mysql_fetch_array($res))
    {

        $title = $row['title'];
        $descripcion = $row['descripcion'];
        $image = $row['image'];
        if($counter == 0)
        {
            $Indicators .='<li data-target="#carousel-example-generic" data-slide-to="'.$counter.'" class="active"></li>';
            $slides .= '<div class="item active">
            <img class="fill" src="ima/'.$image.'" alt="'.$title.'" />
            <div class="carousel-caption">
              <h3>'.$title.'</h3>
              <p>'.$descripcion.'.</p>
            </div>
          </div>';

        }
        else
        {
            $Indicators .='<li data-target="#carousel-example-generic" data-slide-to="'.$counter.'"></li>';
            $slides .= '<div class="item">
            <img class="fill" src="ima/'.$image.'" alt="'.$title.'" />
            <div class="carousel-caption">
              <h3>'.$title.'</h3>
              <p>'.$descripcion.'.</p>
            </div>
          </div>';
        }
        $counter++;
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Andrés Emir Torres Cervera, MEND">

    <title>Tablero de anuncios digital</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/full-slider.css" rel="stylesheet">

</head>

<body onload="changePagination('0','first')">

    <!-- <nav class="navbar navbar-fixed-top navbar-inverse verde" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">MEND</a>
            </div>
            <div class="derecha">
                <a class="navbar-brand" href="#">Tablero de anuncios digital</a>
                <img src="ima/mend.png" alt="Logotipo MEND">
            </div>
        </div>
    </nav> -->

    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li> -->
            <?php echo $Indicators; ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <!-- <div class="item active">
                <div class="fill" style="background-image:url('ima/11.jpg');"></div>
                <div class="carousel-caption">
                    <h1>A Full-Width Image Slider Template</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('ima/21.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Caption 2</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('ima/31.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Caption 3</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('ima/41.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Caption 4</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('ima/51.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Los alumnos de la UTC en conferencias por el dia de TICs</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('ima/61.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Caption 6</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('ima/71.jpg');"></div>
                <div class="carousel-caption">
                    <h1>Campaña de vacunación en la UTC conta el AH1N1 y el tétanos</h1>
                </div>
            </div> -->
            <?php echo $slides; ?>
        </div>

        <!-- Controls -->
       <!--  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a> -->
    </div>


    <!-- <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; MEND 2014</p>
            </div>
        </div>
    </footer> -->
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 7000 //changes the speed
    })
    </script>
</body>

</html>