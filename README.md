
# Obtera.com WordPress Theme

<p align="center">
    <img src="./src/assets/img/image-header.jpg"><br><br>
    A mobile friendly, minimal, and modern WordPress theme designed for Obtera.com.<br>
    Focused on speed, performance, and usability for the end user.
</p>

---

## Instructions

* Download, Fork, or Clone this repo on your WordPress `./wp-content/themes/`
* Download and install [node.js ^6.0.0](https://nodejs.org/en/). If you need multiple version you can use [nvm](http://nvm.sh).
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

This are the thing you need need to update.<br>
I did't add them on customization because this vary on users if they need it or not.

Search Schema: `./src/functions/general.php`
```json
        ...
        "sameAs": [
          "https://facebook.com/obteracom",
          "https://twitter.com/obteracom",
          "https://plus.google.com/+Obteracom",
          "https://youtube.com/obteracom",
          "https://obteracom.tumblr.com/"
        ],
        ...
```

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
      $node->setAttribute("src", 'data:image/gif;base64,R0lGODlhAQABAIAAAPj5+wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDAgNzkuMTYwNDUxLCAyMDE3LzA1LzA2LTAxOjA4OjIxICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCREQzMzVGQTkyNDMxMUU4QjM1MUUzNTg4ODcxMTFGNCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCREQzMzVGOTkyNDMxMUU4QjM1MUUzNTg4ODcxMTFGNCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOCAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjU5MTdEQjc5OTI0MzExRTg5OThDODk1QTBCNjYzQzlFIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjU5MTdEQjdBOTI0MzExRTg5OThDODk1QTBCNjYzQzlFIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+Af/+/fz7+vn49/b19PPy8fDv7u3s6+rp6Ofm5eTj4uHg397d3Nva2djX1tXU09LR0M/OzczLysnIx8bFxMPCwcC/vr28u7q5uLe2tbSzsrGwr66trKuqqainpqWko6KhoJ+enZybmpmYl5aVlJOSkZCPjo2Mi4qJiIeGhYSDgoGAf359fHt6eXh3dnV0c3JxcG9ubWxramloZ2ZlZGNiYWBfXl1cW1pZWFdWVVRTUlFQT05NTEtKSUhHRkVEQ0JBQD8+PTw7Ojk4NzY1NDMyMTAvLi0sKyopKCcmJSQjIiEgHx4dHBsaGRgXFhUUExIREA8ODQwLCgkIBwYFBAMCAQAAIfkEAAAAAAAsAAAAAAEAAQAAAgJEAQA7');
      if ($node->getAttribute('srcset')) {
        $node->setAttribute("data-srcset", $node->getAttribute('srcset'));
        $node->setAttribute("srcset", 'data:image/gif;base64,R0lGODlhAQABAIAAAPj5+wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDAgNzkuMTYwNDUxLCAyMDE3LzA1LzA2LTAxOjA4OjIxICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpCREQzMzVGQTkyNDMxMUU4QjM1MUUzNTg4ODcxMTFGNCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCREQzMzVGOTkyNDMxMUU4QjM1MUUzNTg4ODcxMTFGNCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOCAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjU5MTdEQjc5OTI0MzExRTg5OThDODk1QTBCNjYzQzlFIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjU5MTdEQjdBOTI0MzExRTg5OThDODk1QTBCNjYzQzlFIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+Af/+/fz7+vn49/b19PPy8fDv7u3s6+rp6Ofm5eTj4uHg397d3Nva2djX1tXU09LR0M/OzczLysnIx8bFxMPCwcC/vr28u7q5uLe2tbSzsrGwr66trKuqqainpqWko6KhoJ+enZybmpmYl5aVlJOSkZCPjo2Mi4qJiIeGhYSDgoGAf359fHt6eXh3dnV0c3JxcG9ubWxramloZ2ZlZGNiYWBfXl1cW1pZWFdWVVRTUlFQT05NTEtKSUhHRkVEQ0JBQD8+PTw7Ojk4NzY1NDMyMTAvLi0sKyopKCcmJSQjIiEgHx4dHBsaGRgXFhUUExIREA8ODQwLCgkIBwYFBAMCAQAAIfkEAAAAAAAsAAAAAAEAAQAAAgJEAQA7');
      }
    }
    ...
```

Default Theme Color: `./src/functions/customization.php` and `.src/functions/meta.php`
```php
    ...
      'theme_color', array(
        'default' => '#343a40',
      )
    ...
```

Default Google Analytics ID: `./src/functions/customization.php` and `.src/functions/utilities.php`
```php
    ...
      'google_analytics', array(
        'default' => 'UA-68704357-1',
      )
    ...
```

Default Google AdSense ID: `./src/functions/customization.php` and `.src/functions/utilities.php`
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

Default AddThis ID: `./src/functions/customization.php` and `.src/functions/utilities.php`
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