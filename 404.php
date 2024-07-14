<?php get_header(); ?>
<section class="quatrecentquatre" >
    <div class="infos">
        <div class="description"> 
            <h2>Photo non trouvée !</h2>             
            <p>référence : <span id="photo-ref">la photo recherchée</span></p> 
            <p>catégorie : erreur 404</p> 
 
        </div>
        <div class="infos-photo">
            <a href="<?php echo esc_url(home_url()); ?>">
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/nathalie-mota-404.jpg' ?>" alt="erreur 404" />
            </a>
        </div>
    </div>
    <div class="interactions">
        <div class="interactions-contact">
                <p>Venez découvrir mon <a href="<?php echo esc_url(home_url()); ?>">catalogue</a>, ou contactez-moi pour m'expliquer votre projet.</p>
        </div>
        <div>
            <button class="btn-choice" >Contact</button>  
        </div>
        
    </div>
 </section>
<?php get_footer(); ?>