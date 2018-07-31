
# Obtera.com WordPress Theme

<p align="center">
    <img src="./src/assets/img/image-header.jpg"><br><br>
    A mobile friendly, minimal, and modern WordPress theme designed for Obtera.com.<br>
    Focused on speed, performance, and usability for the end user.
</p>

---

## Instructions

* Download, Fork, or Clone this repo.
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

Lazy Load Default Image: `./src/functions/content.php`
```js
    ...
    foreach ($dom->getElementsByTagName('img') as $node) {
      $node->setAttribute("class", 'lazy ' . $node->getAttribute('class'));
      $node->setAttribute("data-src", $node->getAttribute('src'));
      $node->setAttribute("src", 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');
      if ($node->getAttribute('srcset')) {
        $node->setAttribute("data-srcset", $node->getAttribute('srcset'));
        $node->setAttribute("srcset", 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');
      }
    }
    ...
```

---

## Question:

If you have question, you can always contact me on Twitter [@genesis_neo](https://twitter.com/genesis_neo) and of course here in GitHub [@genesisneo](https://github.com/genesisneo). Thank you.

---

<p align="center">-=[ :heart: ]=-</p>