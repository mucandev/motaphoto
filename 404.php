<?php get_header(); ?>

<!-- Section principale de la page d'erreur 404 -->
<section class="quatrecentquatre" >
    <div class="infos">
        <div class="description"> 
            <h2>Photo non trouvée !</h2>             
            <p>référence : <span id="photo-ref">la photo recherchée</span></p> 
            <p>catégorie : erreur 404</p> 
 
        </div>
        <div class="infos-photo">
            <a href="<?= esc_url(home_url()); ?>">
                <img src="<?= get_stylesheet_directory_uri() . '/assets/images/mota-404-matteo-vistocco-iv420eRkZWc-unsplash_564x607.jpg' ?>" alt="erreur 404" />
            </a>
        </div>
    </div>

    <!-- Section pour encourager l'utilisateur à interagir malgré l'erreur -->
    <div class="interactions">
        <div class="interactions-contact">
                <p>Venez découvrir mon <a href="<?= esc_url(home_url()); ?>">catalogue</a>, ou contactez-moi pour m'expliquer votre projet.</p>
        </div>
        <div>
            <button class="btn-contact">Contact</button>  
        </div>  
    </div>
 </section>

<?php get_footer(); ?>