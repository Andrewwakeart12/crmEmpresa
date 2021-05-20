<?php require 'partials/header.php'?>


<div class="container p-4">
    <div class="row aling-items-start">
    
        <?php foreach ($posts as $post): ?>
        <div class="col-lg-4 mt-2">
            <div class="card text-white bg-dark " style="width: 18rem;">
                <a href="articulo.php?id=<?php echo $post['id'];?>"><img
                        src="<?php echo RUTA;?>/imagenes/<?php echo $post['thumb'];?>" class="card-img-top p-1 pt-3"
                        alt="..."></a>
                <div class="card-body">
                    <a href="articulo.php?id=<?php echo $post['id'];?>">
                        <h5 class="card-title"><?php echo $post['titulo'];?></h5>
                    </a>
                    <p class="fecha"><?php echo $post['fecha']=date_format(date_create($post['fecha']),'Y/m/d');?></p>
                    <p class="card-t5ext thumb"><?php echo $post['extracto'];?>
                    </p>
                    <a href="articulo.php?id=<?php echo $post['id'];?>" class="btn btn-primary">Continuar leyendo</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
require 'partials/pagination.php'?>
<?php require 'partials/footer.php'?>