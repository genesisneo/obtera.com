<?php

  function obtera_widget() {
    register_sidebar(
      array(
        'name' => __('Footer Site Summary', 'obtera'),
        'id' => 'site-summary',
        'class' => 'site-summary',
        'description' => __('This appears in the footer area, below the site brand. Please note that the "<b>Title</b>" will be hidden and this only accepts "<b>One</b>" Text widget. If you have more than one or it is not a Text widget, it will be hidden.', 'obtera'),
        'before_widget' => '<div id="%1$s" class="my-3 site-summary widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<!-- ',
        'after_title' => ' -->',
      )
    );
  }
  add_action('widgets_init', 'obtera_widget');

?>
