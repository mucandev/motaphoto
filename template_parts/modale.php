<div id="contact-overlay">
    <div class="contact-popup">
        <button class="close-btn">
            <span class="dashicons dashicons-no-alt"></span>
        </button>
        <div class="title-contact">
            <div class="title-contact-top">
                <img  src="<?= get_stylesheet_directory_uri() . '/assets/images/Contact line.svg' ?>"/>
            </div>
            <div class="title-contact-bottom">
                    <img  src="<?= get_stylesheet_directory_uri() . '/assets/images/Contact line.svg' ?>"/>  
            </div>
        </div>

        <div class="contact-form">
        <?php
            echo do_shortcode('[contact-form-7 id="c40de8a" title="Formulaire de contact 1"]');
        ?>
        </div>
    </div>
</div>