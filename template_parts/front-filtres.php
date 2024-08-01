<div class='filters'>
        <div class='filters-block' id="tax">                
            <div class="dropdown" id="tri-categorie">
                <input type="checkbox" class="dropdown__switch" id="filter-switch-categorie" hidden />
                <label for="filter-switch-categorie" class="dropdown__options-filter" >
                    <ul class="dropdown__filter" role="listbox" tabindex="-1">
                        <li class="dropdown__filter-selected" aria-selected="true">catégories</li>
                        <li>
                            <ul class="dropdown__select">
                                <li id="categorie-full" class="dropdown__select-full" role="option">catégories</li>
                                <?php
                                $events = get_terms('photocategories');
                                if (!empty($events) && !is_wp_error($events)) { 
                                    foreach ($events as $event) {                             
                                        echo '<li class="dropdown__select-option" role="option" id="' . esc_attr($event->slug) . '">' . esc_html($event->name) . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>			
                </label>
            </div>
            <div class="dropdown" id="tri-format">
                <input type="checkbox" class="dropdown__switch" id="filter-switch-format" hidden />
                <label for="filter-switch-format" class="dropdown__options-filter" >
                    <ul class="dropdown__filter" role="listbox" tabindex="-1">
                        <li class="dropdown__filter-selected" aria-selected="true">formats</li>
                        <li>
                            <ul class="dropdown__select">
                                <li id="format-full" class="dropdown__select-full" role="option">formats</li>
                                <?php
                                $sizes = get_terms('formats');
                                if (!empty($sizes) && !is_wp_error($sizes)) { 
                                    foreach ($sizes as $size) {                             
                                        echo '<li class="dropdown__select-option" role="option" id="' . esc_attr($size->slug) . '">' . esc_html($size->name) . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>			
                </label>
            </div>
        </div>
        <div class='filters-block' id="date">
                <div class="dropdown" id="tri-date">
                    <input type="checkbox" class="dropdown__switch" id="filter-switch-date" hidden />
                    <label for="filter-switch-date" class="dropdown__options-filter"  >
                        <ul class="dropdown__filter" role="listbox" tabindex="-1">
                            <li class="dropdown__filter-selected" aria-selected="true">trier par</li>
                            <li>
                                <ul class="dropdown__select">
                                    <li id="date-full" class="dropdown__select-full" role="option">trier par</li>
                                    <li id="DESC" class="dropdown__select-option" role="option">à partir des plus récentes</li>
                                    <li id="ASC" class="dropdown__select-option" role="option">à partir des plus anciennes</li>
                                </ul>
                            </li>
                        </ul>			
                    </label>
                </div>
            </div>  
        </div>
    </div> 