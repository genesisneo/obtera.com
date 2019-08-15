            <aside class="col-12 col-lg-4 order-2 order-lg-3 footer-popular-categories">
              <h5 class="mt-2 mb-3">Popular Category</h5>
              <ul class="list-unstyled">
                <?php
                  $topCategories = get_categories(
                    array(
                      'depth' => 1,
                      'hide_empty' => 1,
                      'number' => 5,
                      'order' => 'desc',
                      'orderby' => 'count',
                      'taxonomy' => 'category',
                      'type' => 'post',
                    )
                  );
                  foreach ($topCategories as $category) {
                    echo
                    '<li class="mb-1 pb-1 border-bottom">'.
                      '<a class="d-block" href="'.get_category_link($category->term_id).'">'.
                        $category->name.
                        '<span class="float-right text-muted">'.$category->count.'</span>'.
                      '</a>'.
                    '</li>';
                  }
                ?>
              </ul>
              <h5 class="mt-2 mb-3">Search</h5>
              <form class="form-inline row mb-3 search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <div class="col-12 input-group">
                  <label hidden for="search">Search</label>
                  <input
                    id="search"
                    class="form-control search-input"
                    name="s"
                    type="search"
                    placeholder="Search..."
                    aria-label="search"
                  >
                  <div class="input-group-append">
                    <button class="input-group-text btn" type="submit" aria-label="search">
                      <svg class="icon icon-search" role="img">
                        <use href="#icon-search" xlink:href="#icon-search"></use>
                      </svg>
                    </button>
                  </div>
                </div>
              </form>
            </aside>
