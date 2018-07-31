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
                  <input class="form-control search-input" type="search" placeholder="Search..." name="s">
                  <div class="input-group-append">
                    <button class="input-group-text dashicons-search btn" type="submit"></button>
                  </div>
                </div>
              </form>
            </aside>
