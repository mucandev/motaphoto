<div id="contact-overlay">
    <div class="contact-popup">
        <button class="close-btn" aria-controls="contact-popup" aria-expanded="false" aria-label="contact" type="button">
            <img  src="<?= get_stylesheet_directory_uri() . '/assets/images/cross-white.svg' ?>"/> 
        </button>
        <div class="title-contact">
            <div class="title-contact-top">
                <img  src="<?= get_stylesheet_directory_uri() . '/assets/images/contact-line.svg' ?>"/>
            </div>
            <div class="title-contact-bottom">
                    <img  src="<?= get_stylesheet_directory_uri() . '/assets/images/contact-line.svg' ?>"/>  
            </div>
        </div>

        <div class="contact-form">
        <?php
            echo do_shortcode('[contact-form-7 id="c40de8a" title="Formulaire de contact 1"]');
        ?>
        </div>
    </div>
</div>