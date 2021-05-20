<?php require 'partials/header.php'?>
<style>
.ban{
    background: white;
    transform: translateY(-85%);
    height:50em;
    padding:40px;
}
.ban_img{
   
    height:40em;
    width:100%;
    position:absolute;
    
    margin:0;
   
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
    background-color: rgba(0, 0, 0, 0.6);
}
</style>

<div class="ban_img"></div>
<div class="container p-4">

    <div class="row aling-items-start col-12 d-flex">
       
        <a href="#"><img src="imagenes/<?php echo $articulo['thumb']?>" class="card-img-top p-1 pt-3 justify-self-center" alt="..."></a>
        <div class="ban">
            <h1 class="card-title"><?php echo $articulo['titulo']?></h1>
            <p class="fecha"><?php echo $post['fecha']=date_format(date_create($articulo['fecha']),'Y/m/d');?></p>
            <p class="card-text thumb"><?php echo $articulo['texto']?></p>

        </div>
    </div>
</div>

<?php require 'partials/footer.php'?>