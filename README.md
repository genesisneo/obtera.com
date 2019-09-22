
# Obtera.com WordPress Theme

<p align="center">
  <img src="./src/assets/img/image-header.jpg"><br><br>
  A mobile friendly, minimal, and modern WordPress theme designed for Obtera.com.<br>
  Focused on speed, performance, and usability for the end user.
</p>

---

## Features

* Responsive design
* Simple, clean, and lightweight
* SEO friendly for better search engine ranking
* Integrated native lazyloading with script fallback
* Google Analytics ready for site statistics
* Google Adsense integrated for ads earnings
* AddThis integrated for social media sharing

---

## Plugins

- `AMP` - https://wordpress.org/plugins/amp/
  - Enable AMP on your WordPress site, the WordPress way.
- `Cloudflare` - https://wordpress.org/plugins/cloudflare/
  - Cloudflare speeds up and protects your WordPress site.
- `Disqus Conditional Load` - https://wordpress.org/plugins/disqus-conditional-load/
  - Disqus commenting system for WordPress with advanced features like like lazy load, shortcode etc.
- `NGT jsDelivr CDN` - https://wordpress.org/plugins/nextgenthemes-jsdelivr-this/
  - Makes your site load all WP Core and plugin assets from jsDelivr CDN.
- `Smush` - https://wordpress.org/plugins/wp-smushit/
  - Reduce image file sizes, improve performance and boost your SEO.
- `WP-Optimize - Clean, Compress, Cache` - https://wordpress.org/plugins/wp-optimize/
  - WP-Optimize makes your site fast and efficient. It cleans the database, compresses images and caches pages.
- `WPForms Lite` - https://wordpress.org/plugins/wpforms-lite/
  - Beginner friendly WordPress contact form plugin. Use our Drag & Drop form builder to create your WordPress forms.
- `Yoast SEO` - https://wordpress.org/plugins/wordpress-seo/
  - The first true all-in-one SEO solution for WordPress, including on-page content analysis, XML sitemaps and much more.
- `Glue for Yoast SEO & AMP` - https://wordpress.org/plugins/glue-for-yoast-seo-amp/
  - Makes sure the default WordPress AMP plugin uses the proper Yoast SEO metadata.

---

## Instructions

* Download, Fork, or Clone this repo on your WordPress `./wp-content/themes/`
* Download and install [node.js ^6.0.0](https://nodejs.org/en/). If you need multiple version you can use [nvm](https://nvm.sh).
* Open terminal or shell on this repo and type `npm i -g gulp`, once done, type `npm i` to install all dependcies for this repo.
* Open `./src/assets/config/settings.json`. This is all the theme settings, you can change it according to your needs.
```json
{
    "theme": {...},
    "dist": {...},
    "mamp": {...},
    "dependencies": {...},
}
```

> Where:
> * `theme`: theme file locations
> * `dist`: path when your ready to publish your theme
> * `mamp`: local server of your wordpress
> * `dependencies`: so far this is for browser-sync

* To run application for dev, you can type `gulp` on your terminal.
* When finished & it's ready to go livem you can type `gulp dist`. It will create a new folder called `./obtera/` with all your files.

---

## Notes

This are the thing you need need to be update.<br>
I did't add them on customization because this vary on users if they need it or not.

Default Site Keyword: `./src/functions/customization.php` and `./src/functions/meta.php`
```php
    ...
      'site_keyword', array(
        'default' => 'obtera, wordpress, theme, web, design, ui, ux, user, interface, experience',
      )
    ...
```

Lazy Load Default Image: `./src/functions/content.php`
```js
    ...
    foreach ($dom->getElementsByTagName('img') as $node) {
      $node->setAttribute("class", 'lazy ' . $node->getAttribute('class'));
      $node->setAttribute("data-src", $node->getAttribute('src'));
      $node->setAttribute("src", 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP88fPXfwAJyAPs05GT/QAAAABJRU5ErkJggg==');
      if ($node->getAttribute('srcset')) {
        $node->setAttribute("data-srcset", $node->getAttribute('srcset'));
        $node->setAttribute("srcset", 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP88fPXfwAJyAPs05GT/QAAAABJRU5ErkJggg==');
      }
    }
    ...
```

Transparent base64 png pixel generator https://png-pixel.com/

Default Theme Color: `./src/functions/customization.php`
```php
    ...
      'theme_color', array(
        'default' => '#343a40',
      )
    ...
```

Default Google Analytics ID: `./src/functions/customization.php`
```php
    ...
      'google_analytics', array(
        'default' => 'UA-68704357-1',
      )
    ...
```

Default Google AdSense ID: `./src/functions/customization.php`
```php
    ...
      'google_adsense', array(
        'default' => 'ca-pub-4543509049123673',
      )
    ...
      'google_adsense_default', array(
        'default' => '3941328836',
      )
    ...
      'google_adsense_colored', array(
        'default' => '5500728600',
      )
    ...
```

Default AddThis ID: `./src/functions/customization.php`
```php
    ...
      'addthis_id', array(
        'default' => 'ra-562f202ecd1822ce',
      )
    ...
```

---

## Question:

If you have question, you can always contact me on Twitter [@genesis_neo](https://twitter.com/genesis_neo) and of course here in GitHub [@genesisneo](https://github.com/genesisneo). Thank you.

---

<p align="center">-=[ :heart: ]=-</p>