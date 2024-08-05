<div class='filters'>
    <div class='filters-block' id="tax">
        <menu class="dropdown" id="tri-categorie">
            <input type="checkbox" class="dropdown__switch" id="filter-switch-categorie" aria-label="Sélectionnez une catégorie" hidden />
            <label for="filter-switch-categorie" class="dropdown__options-filter" aria-haspopup="listbox" aria-expanded="false">
                <span class="dropdown__filter-selected">Catégories</span>
                <span class="dropdown__icon"></span> <!-- Ajout de l'icône ici -->
            </label>
            <ul class="dropdown__select" role="listbox" aria-label="Sélectionnez une catégorie">
                <li id="categorie-full" class="dropdown__select-full" role="option" aria-label="Toutes les catégories">Catégories</li>
                <?php
                $events = get_terms('photocategories');
                if (!empty($events) && !is_wp_error($events)) { 
                    foreach ($events as $event) {                             
                        echo '<li class="dropdown__select-option" role="option" id="' . esc_attr($event->slug) . '" aria-selected="false">' . esc_html($event->name) . '</li>';
                    }
                }
                ?>
            </ul>
        </menu>
        <menu class="dropdown" id="tri-format">
            <input type="checkbox" class="dropdown__switch" id="filter-switch-format" aria-label="Sélectionnez un format" hidden />
            <label for="filter-switch-format" class="dropdown__options-filter" aria-haspopup="listbox" aria-expanded="false">
                <span class="dropdown__filter-selected">Formats</span>
                <span class="dropdown__icon"></span> <!-- Ajout de l'icône ici -->
            </label>
            <ul class="dropdown__select" role="listbox" aria-label="Sélectionnez un format">
                <li id="format-full" class="dropdown__select-full" role="option" aria-label="Tous les formats">Formats</li>
                <?php
                $sizes = get_terms('formats');
                if (!empty($sizes) && !is_wp_error($sizes)) { 
                    foreach ($sizes as $size) {                             
                        echo '<li class="dropdown__select-option" role="option" id="' . esc_attr($size->slug) . '" aria-selected="false">' . esc_html($size->name) . '</li>';
                    }
                }
                ?>
            </ul>
        </menu>
    </div>
    <div class='filters-block' id="date">
        <menu class="dropdown" id="tri-date">
            <input type="checkbox" class="dropdown__switch" id="filter-switch-date" aria-label="Sélectionnez un sens de tri chronologique" hidden />
            <label for="filter-switch-date" class="dropdown__options-filter" aria-haspopup="listbox" aria-expanded="false">
                <span class="dropdown__filter-selected">Trier par</span>
                <span class="dropdown__icon"></span> <!-- Ajout de l'icône ici -->
            </label>
            <ul class="dropdown__select" role="listbox" aria-label="Sélectionnez un sens de tri chronologique">
                <li id="date-full" class="dropdown__select-full" role="option" aria-label="tri par défaut">Trier par</li>
                <li id="DESC" class="dropdown__select-option" role="option" aria-selected="false">À partir des plus récentes</li>
                <li id="ASC" class="dropdown__select-option" role="option" aria-selected="false">À partir des plus anciennes</li>
            </ul>
        </menu>
    </div>
</div>
