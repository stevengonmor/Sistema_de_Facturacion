<div class ="container-fluid full-screen row">
    <div class="content-element col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <p class ="tittle">¿Tienes experiencia en alguna de estas áreas?</p>
        <div id="carousel-container">
            <div id="carousel-main" class="CentroCarousel carousel slide col-xs-12 col-sm-12 col-md-12 col-lg-9 col-xl-9" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="Imagenes carousel-item active">
                        <img src="./img/desarrollo-web.png" class="d-block w-100" alt="1">
                    </div>
                    <div class="Imagenes carousel-item">
                        <img src="./img/desarrollo-software.png" class="d-block w-100" alt="2">
                    </div>
                    <div class="Imagenes carousel-item">
                        <img src="./img/ciberseguridad.png" class="d-block w-100" alt="3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-main" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-main" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
        <br>
        <div class="description col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h6 class >Antes de considerar una oferta laboral o de estudio en estas áreas, es fundamental evaluar la experiencia de otros. 
                Cuéntanos cómo ha sido tu experiencia en una de estas áreas, ya sea en el aspecto laboral
                o personal. Tu experiencia puede ayudar a otro programador a tomar una decisión importante en su vida.
            </h6>
        </div> <br>
        <?php if (!isset($_SESSION['id'])) { ?>
            <a href ='?c=log_in&deny=1' id ="create-button" class="info col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">Cuéntanos</a>
        <?php } else { ?>
            <a href ='?c=create_blog' id ="create-button" class="info col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">Cuéntanos</a>
        <?php } ?>
    </div>
    <div class="content-element col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <p class ="tittle">Últimos Blogs</p>
        <div class="description last-five-height col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <?php foreach ($blogs as $blog) { ?>
                <div class="light-blue col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <a href ="?c=read_blog&id=<?php echo $blog->get_id() ?>" class ="landing-text"><?php echo $blog->tittle ?></a><br>
                    <br>
                    <p class = "author-date landing-text"><img alt ="Imagen" src ="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($blog->get_user_profile_picture()); ?>" class="rounded-circle" width="40" height="40">
                        <a class = "landing-text" href = '?c=read_user&id=<?php echo $blog->get_user_id(); ?>'><?php echo $blog->get_user_name(); ?></a>, <?php echo $blog->date ?></p>
                </div>
                <br>
            <?php } ?>
        </div>
    </div>
</div>
