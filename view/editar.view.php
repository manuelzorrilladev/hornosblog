<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion de articulos</title>
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

            <div class="contenedor">
                <div class="postt">
                    <article>
                        
                        <h2 class="titulo">Editar Articulo</h2>
                        <h2>Este articulo tiene <?php echo $conta; ?> vistas</h2>
                        <form class="formulario" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                
                            <input type="hidden" value="<?php echo $post['id']; ?>" name="id">
                            <input type="text" name="titulo" value="<?php echo $post['titulo']; ?>">
                            <input type="text" name="extracto" value="<?php echo $post['extracto']; ?>">
                    
                            <textarea name="texto"><?php echo $post['texto']; ?></textarea>
                            <input type="file" name="thumb" >
                            <input type="hidden" value="<?php echo $post['thumb']; ?>" name="thumb-guardada">
        
                            <input type="submit"  value="Modificar Articulo">
                        
                        </form>
                
                    </article>
            
                </div>
            </div>
                
        
        
        
        
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