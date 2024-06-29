<div id="contact-overlay">
    <button class="close-btn">X</button>
    <div class="contact-popup">
        <img  src="<?php echo get_stylesheet_directory_uri() . '/assets/images/contact-header.png' ?>" alt="contact"/>
        <div class="contact-form">
        <?php
            echo do_shortcode('[contact-form-7 id="c40de8a" title="Formulaire de contact 1"]');
        ?>
        </div>
    </div>
</div>