<?php
    $events = get_terms('photocategories');

    if (!empty($events) && !is_wp_error($events)) { ?>
        <label for="photocategories">Catégories</label>
        <select name="photocategories" id="photocategories">
            <?php foreach($events as $event) { ?>
                <option value="<?= esc_attr($event->slug); ?>">
                    <?= esc_html($event->name); ?>
                </option>
            <?php } ?>
        </select>
<?php } ?>
