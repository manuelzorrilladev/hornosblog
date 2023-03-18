<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <link rel="shortcut icon" href="img/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo RUTA;?>/css/estilos.css">
</head>
<body>
<div class="ctx">
            <div class="toggle" onclick="toggleMenu();"></div>
        </div>
            <nav class="nav">
                <div class="rx">
                    <div class="logo">
                        <p><a href="<?php echo RUTA; ?>">Hornos.com.es</a></p>
                    </div>
                    <form name="busqueda" action="<?php echo RUTA; ?>/buscar.php" method="get" class="buscar">
                        <input type="text" name="busqueda" placeholder="Buscar" >
                        <button type="submit" class="icono">></button>
                    </form>
                    <nav class="menu">
                        <ul>
                            <li><a href="login.php">Login</a></li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
<div class="rr">
            <div class="banner">
                <div class="header">
                    
                </div>
                <img src="img/banner.jpg" alt="banner">
            </div>
<div class="contenedor2"></div>
        <div class="contenedor4">
            
            <?php foreach($resultados as $post): ?>
                <div class="post">
                    <article>
                        <div class="postt">
                            <h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo'] ?></a></h2>
                            <p class="fecha"><?php echo fecha($post['fecha']); ?></p>
                            <p class="extracto"><?php echo $post['extracto'] ?></p>
                            <a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Continuar Leyendo</a>
                        </div>
                        <div class="thumb">
                            <a href="single.php?id=<?php echo $post['id']; ?>">
                                <img src="img/<?php echo $post['thumb']; ?>" alt="<?php echo $post['titulo'] ?>">
                            </a>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>




        
            <?php $numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion ); ?>
            <section class="paginacion">
                <ul>
                    <?php if(pagina_actual() === 1 ): ?>
                        <li class="disabled">&laquo;</li>
                    <?php else:  ?>
                    <li><a href="index.php?p=<?php echo pagina_actual() - 1 ?>">&laquo;</a></li>
                        
                    <?php endif;  ?>

                    <?php for($i = 1; $i <= $numero_paginas; $i++): ?>
                        <?php if(pagina_actual() === $i): ?>
                            <li class="active">
                                <?php echo $i; ?>
                            </li>
                        <?php else: ?>
                            <li><a href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            
                        <?php endif; ?>        
                    <?php endfor;  ?>

                    <?php if(pagina_actual() === $numero_paginas): ?>
                        <li class=disabled>&raquo;</a></li>
                    <?php else: ?>
                        <li><a href="index.php?p=<?php echo pagina_actual() + 1;?>">&raquo;</a></li>
                    <?php endif; ?>

                </ul>
            </section>
        </div>

    <footer>
         <h2 class="copyright">Societ Media.</h2>
        <p class="copyright">Todos los derechos reservados</p>
    </footer>
</div>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/scrollSmooth.js"></script>
</body>
</html>