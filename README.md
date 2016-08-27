# Taringa for Jetpack

Extension for Jetpack's Sharing to allow sharing a post to Taringa.

[Jetpack](https://jetpack.com) is a a popular WordPress plugin which allows your site to include Sharing buttons, and lots of [other cools features](https://jetpack.com/features/).

[Taringa](https://taringa.net) is the biggest Social Network in Latin America with more than 60M monthly unique visitors.

This project is to be developed during the [Media Party 2016](http://mediaparty.info/) Hackaton.

There's a [Hackdash dashboard for the Hackaton](https://hackdash.org/dashboards/mp16hack).

## Installation

This plugin depends on the **Jetpack** plugin for Wordpress.

1. [Install Jetpack](https://jetpack.com/install/) on your WordPress site.
1. Get into your WordPress installation's plugins directory and [download this plugin](https://github.com/eliorivero/taringa-for-jetpack/archive/master.zip)
2. Unzip the plugin and rename the directory from `master` to `taringa-for-jetpack`.
3. Get into you WordPress plugins settings page and **activate** the plugin.


### Installation while developing

1. Get into your WordPress installation's plugins directory and clone this repo.
```sh
$ cd wp-content/plugins
$ git clone https://github.com/eliorivero/taringa-for-jetpack
```
2. Login to the WP Admin, go to the Plugins area and activate this plugin.

## Configuration

1. go to Settings > Sharing
2. drag the Taringa button to the area titled Enabled Services
3. choose the style of the button and where to display
4. save the changes

## Resources for devs while doing this plugin.

* [Taringa Share buttons](http://www.taringa.net/widgets/compartir)
* [Taringa API Reference](http://api.taringa.net/docs/taringa/methods/home.html)
* [HackDash project](https://hackdash.org/projects/57c1a449d9284f016c047272)


## License

GPL v2

