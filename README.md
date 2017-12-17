## feature-web

feature-web is a [Composer
package](https://packagist.org/packages/ekuiter/feature-web) that offers an
integrated solution for feature-oriented programming on the web, including
domain and requirements analysis as well as domain implementation and product
derivation.

To see it in action, have a look at the uvr2web software product line (*coming
soon*).

### How it works

feature-web combines multiple packages for feature-oriented programming to
provide a quick way to bring software product lines into the browser.

This is how feature-web addresses the different phases of product-line engineering:

- *domain analysis*: visualization of the feature model using
   [ekuiter/feature-model-viz](https://github.com/ekuiter/feature-model-viz)
- *requirements analysis*: the customer can select the features serving his
   needs with
   [ekuiter/feature-configurator](https://github.com/ekuiter/feature-configurator)
- *domain implementation*:
   [ekuiter/feature-php](https://github.com/ekuiter/feature-php) offers a
   variety of variability mechanisms to implement features
- *product derivation*: automated file generation and ZIP export using
   [ekuiter/feature-php](https://github.com/ekuiter/feature-php)

The links above provide you with further details on the inner workings,
requirements and documentation for these packages.

Note that feature-web and its packages are inspired by and tightly coupled with
[FeatureIDE](https://featureide.github.io/) feature models and configurations.

### Usage

On the [example branch](https://github.com/ekuiter/feature-web/tree/example) you
can find the smallest working example for feature-web with install instructions.

feature-web is a very quick and simple way to set up a product line on the web,
but it doesn't have a lot of configuration options. If you need more
customization, you have to adapt your own version of feature-web or use its
packages (see above) directly.

### License

This project is released under the [LGPL v3 license](LICENSE.txt).