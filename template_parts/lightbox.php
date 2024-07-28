<div class="lightbox">
    <button class="lightbox__close" aria-controls="lightbox" aria-expanded="false" aria-label="lightbox" type="button">
        <span class="dashicons dashicons-no-alt"></span>
    </button>
    <div class="lightbox__open">
        <img src="<?= get_stylesheet_directory_uri() . '/assets/images/nathalie-mota_1783X1920.jpg' ?>"  />
        <!-- <img src="https://picsum.photos/1920"  /> -->
    </div>
    <div class="lightbox__arrows">
        <div class="lightbox__arrows--previous">
            <img src="<?= get_stylesheet_directory_uri() . '/assets/images/arrow-left-white.svg' ?>" alt="previous" />
            <p> Précédente</p>
        </div>
        <div class="lightbox__arrows--next">
            <p> Suivante</p>
            <img src="<?= get_stylesheet_directory_uri() . '/assets/images/arrow-right-white.svg' ?>" alt="next" />
        </div>
    </div>
    <div class="informations-photo">
        <p class="reference-photo"></p>
        <p class="categorie-photo"></p>
    </div>
</div>