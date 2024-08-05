<div class='filters'>
    <div class='filters-block' id="tax">
        <menu class="dropdown" id="tri-categorie">
            <input type="checkbox" class="dropdown__switch" id="filter-switch-categorie" aria-label="Sélectionnez une catégorie" hidden />
            <label for="filter-switch-categorie" class="dropdown__options-filter" aria-haspopup="true" aria-expanded="false">
                <ul class="dropdown__filter" role="listbox" aria-label="catégorie" tabindex="-1">
                    <li class="dropdown__filter-selected" aria-selected="true">Catégories</li>
                    <li>
                        <ul class="dropdown__select" aria-label="Sélectionnez une catégorie" role="listbox">
                            <li id="categorie-full" class="dropdown__select-full" role="option">Catégories</li>
                            <?php
                            $events = get_terms('photocategories');
                            if (!empty($events) && !is_wp_error($events)) { 
                                foreach ($events as $event) {                             
                                    echo '<li class="dropdown__select-option" role="option" id="' . esc_attr($event->slug) . '" aria-selected="false">' . esc_html($event->name) . '</li>';
                                }
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </label>
        </menu>
        <menu class="dropdown" id="tri-format">
            <input type="checkbox" class="dropdown__switch" id="filter-switch-format" aria-label="Sélectionnez un format" hidden />
            <label for="filter-switch-format" class="dropdown__options-filter" aria-haspopup="true" aria-expanded="false">
                <ul class="dropdown__filter" role="listbox" aria-label="format" tabindex="-1">
                    <li class="dropdown__filter-selected" aria-selected="true">Formats</li>
                    <li>
                        <ul class="dropdown__select" role="listbox" aria-label="Sélectionnez un format">
                            <li id="format-full" class="dropdown__select-full" role="option">Formats</li>
                            <?php
                            $sizes = get_terms('formats');
                            if (!empty($sizes) && !is_wp_error($sizes)) { 
                                foreach ($sizes as $size) {                             
                                    echo '<li class="dropdown__select-option" role="option" id="' . esc_attr($size->slug) . '" aria-selected="false">' . esc_html($size->name) . '</li>';
                                }
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </label>
        </menu>
    </div>
    <div class='filters-block' id="date">
        <menu class="dropdown" id="tri-date">
            <input type="checkbox" class="dropdown__switch" id="filter-switch-date" aria-label="Sélectionnez un sens de tri chronologique" hidden />
            <label for="filter-switch-date" class="dropdown__options-filter" aria-haspopup="true" aria-expanded="false">
                <ul class="dropdown__filter" role="listbox" aria-label="sens de tri chronologique" tabindex="-1">
                    <li class="dropdown__filter-selected" aria-selected="true">Trier par</li>
                    <li>
                        <ul class="dropdown__select" role="listbox" aria-label="Sélectionnez un sens de tri chronologique">
                            <li id="date-full" class="dropdown__select-full" role="option">Trier par</li>
                            <li id="DESC" class="dropdown__select-option" role="option" aria-selected="false">À partir des plus récentes</li>
                            <li id="ASC" class="dropdown__select-option" role="option" aria-selected="false">À partir des plus anciennes</li>
                        </ul>
                    </li>
                </ul>
            </label>
        </menu>
    </div>
</div>
