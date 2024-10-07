=== MB Text Limiter ===
Contributors: metabox, rilwis, paracetamol27
Donate link: https://metabox.io
Tags: custom fields, meta box, text limit
Requires at least: 5.9
Tested up to: 6.6.2
Stable tag: 1.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Limit number of characters or words entered for text and textarea fields in meta boxes.

== Description ==

Text Limiter is an extension for [Meta Box](https://metabox.io) plugin which allows you to limit number of characters or words entered for [text](https://docs.metabox.io/fields/text/), [textarea](https://docs.metabox.io/fields/textarea/) and [WYSIWYG](https://docs.metabox.io/fields/wysiwyg/) fields.

### Usage

To start using text limiter, just add the following parameters to `text`, `textarea` or `wysiwyg` fields:

`'limit'      => 20, // Number of characters or words
'limit_type' => 'character', // Limit by 'character' or 'word'. Optional. Default is 'character'`

### Plugin Links

- [Project Page](https://metabox.io/plugins/meta-box-text-limiter/)
- [Documentation](https://docs.metabox.io)
- [Github repo](https://github.com/wpmetabox/meta-box-text-limiter)
- [View other extensions](https://metabox.io/plugins/)

### You might also like

If you like this plugin, you might also like our other WordPress products:

- [Slim SEO](https://wpslimseo.com) - A fast, lightweight and full-featured SEO plugin for WordPress with minimal configuration.
- [Slim SEO Schema](https://wpslimseo.com/products/slim-seo-schema/) - An advanced, powerful and flexible plugin to add schemas to WordPress.
- [Slim SEO Link Manager](https://wpslimseo.com/products/slim-seo-link-manager/) - Build internal link easier in WordPress with real-time reports.
- [GretaThemes](https://gretathemes.com) - Free and premium WordPress themes that clean, simple and just work.
- [Auto Listings](https://wpautolistings.com) - A car sale and dealership plugin for WordPress.

== Installation ==

You need to install [Meta Box](https://metabox.io) plugin first

- Go to Plugins | Add New and search for Meta Box
- Click **Install Now** button to install the plugin
- After installing, click **Activate Plugin** to activate the plugin

Install **Meta Box Text Limiter** extension

- Go to **Plugins | Add New** and search for **Meta Box Text Limiter**
- Click **Install Now** button to install the plugin
- After installing, click **Activate Plugin** to activate the plugin

To start using text limiter, just add the following parameters to `text` or `textarea` fields:

`'limit'      => 20, // Number of characters or words
'limit_type' => 'character', // Limit by 'character' or 'word'. Optional. Default is 'character'`


== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

= 1.2.2 - 2024-10-07 =
- Rename to MB Text Limiter
- Fix issues with Plugin Check (PCP)

= 1.2.1 - 2024-09-12 =
- Do not count HTML tags

= 1.2.0 - 2024-03-14 =
- Add support for WYSIWYG field
- Update the style

= 1.1.3 - 2021-04-24 =
* Fix notice "Trying to access array offset" (by checking field value if field not found).

= 1.1.2 - 2021-01-27 =
* Fix input references which breaks the functionality.

= 1.1.0 =
* Changed: Rewrite the JavaScript, making it work for cloneable groups.

= 1.0.4 =
* Changed: Allow the plugin to be included in themes/plugins.

= 1.0.3 =
* Fix: Multi-bytes characters are cut from the frontend.

= 1.0.2 =
* Fix: Warning in helper function if using limit by character.

= 1.0.1 =
* Improvement: Added front-end text-limiting functionality

= 1.0.0 =
* First release

== Upgrade Notice ==
