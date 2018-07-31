<?php

  // Check for compatibility
  if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '<')) {
    require get_template_directory() . '/src/functions/compatibility.php';
    return;
  }

  // Add filters
  require get_parent_theme_file_path('/src/functions/filters.php');

  // Add general requirements
  require get_parent_theme_file_path('/src/functions/general.php');

  // Add icons
  require get_parent_theme_file_path('/src/functions/icons.php');

  // Add custom meta
  require get_parent_theme_file_path('/src/functions/meta.php');

  // Add theme customization
  require get_parent_theme_file_path('/src/functions/customization.php');

  // Add supported widgets
  require get_parent_theme_file_path('/src/functions/widgets.php');

  // Add custom navigation walker
  require get_parent_theme_file_path('/src/functions/navigation.php');

  // Add utilities
  require get_parent_theme_file_path('/src/functions/utilities.php');

  // Add content
  require get_parent_theme_file_path('/src/functions/content.php');

?>
