
<div class="dropdown">
	<input type="checkbox" class="dropdown__switch" id="filter-switch" hidden />
	<label for="filter-switch" class="dropdown__options-filter">
		<ul class="dropdown__filter" role="listbox" tabindex="-1">
			<li class="dropdown__filter-selected" aria-selected="true">
				catégories
			</li>
			<li>
				<ul class="dropdown__select">
                     <?php
                    $events = get_terms('photocategories');

                    if (!empty($events) && !is_wp_error($events)) { 
                        foreach ($events as $event) {                             
                            echo '<li class="dropdown__select-option" role="option" id="' . esc_attr($event->slug) . '">' . esc_html($event->name) . '</li>';
                        }
                    }
                    ?>
					</li>
				</ul>
			</li>
		</ul>			
	</label>
</div>