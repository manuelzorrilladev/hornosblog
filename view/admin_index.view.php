<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <meta name="robots" content="noindex">
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
            <!-- <div class="banner">
                <div class="header"></div>
                <img src="img/banner.jpg" alt="banner">
            </div> -->
            <div class="contenedor">
                <h2>Panel de Control</h2>
                <h1>La pagina tiene un total de <?php echo $conta2; ?> visitas</h1>
                <div class="botones">
                    <a href="nuevo.php" class="button">Nuevo Post</a>
                    <a href="cerrar.php" class="button">Cerrar Sesion</a>
                
                </div>
                <?php foreach($posts as $post): ?>
                    <div class="post2">
                        <article>
                        <h2 class="titulo"><?php echo $post['titulo']; ?></h2>
                        <a href="editar.php?id=<?php echo $post['id']; ?>">Editar</a>
                        <a href="../single.php?id= <?php echo $post['id']; ?>">Ver</a>
                        <a href="borrar.php?id=<?php echo $post['id']; ?>">Borrar</a>
                        </article>
                    </div>
                <?php endforeach; ?>




            
                <?php $numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion ); ?>
                <section class="paginacion">
                <ul>
                    <?php if(pagina_actual() === 1 ): ?>
                        <li class="disabled">&laquo;</li>
                    <?php else:  ?>
                    <li><a href="#">&laquo;</a></li>
                        
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
                        <li><a href="#">&raquo;</a></li>
                    <?php endif; ?>
    
                  
                </ul>
            </section>
            </div>

            <footer>
                <h2 class="copyright">Societ Media.</h2>
                <p class="copyright">Todos los derechos reservados</p>
            </footer>
        </div>
    <script src="https://kit.fontawesome.com/4739b839a0.js" crossorigin="anonymous"></script>  
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="../js/scrollSmooth.js"></script>
</body>
</html>