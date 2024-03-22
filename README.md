<p align="center">
    <a href="https://github.com/ui-awesome/html-svg" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/121752654?s=200&v=4" height="100px">
    </a>
    <h1 align="center">UI Awesome HTML SVG tag for PHP.</h1>
    <br>
</p>

<p align="center">
    <a href="https://github.com/ui-awesome/html-svg/actions/workflows/build.yml" target="_blank">
        <img src="https://github.com/ui-awesome/html-svg/actions/workflows/build.yml/badge.svg" alt="PHPUnit">
    </a>
    <a href="https://codecov.io/gh/ui-awesome/html-svg" target="_blank">
        <img src="https://codecov.io/gh/ui-awesome/html-svg/branch/main/graph/badge.svg?token=MF0XUGVLYC" alt="Codecov">
    </a>
    <a href="https://dashboard.stryker-mutator.io/reports/github.com/ui-awesome/html-svg/main" target="_blank">
        <img src="https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fyii2-extensions%2Fasset-bootstrap5%2Fmain" alt="Infection">
    </a>
    <a href="https://github.com/ui-awesome/html-svg/actions/workflows/static.yml" target="_blank">
        <img src="https://github.com/ui-awesome/html-svg/actions/workflows/static.yml/badge.svg" alt="Psalm">
    </a>
    <a href="https://shepherd.dev/github/ui-awesome/html-svg" target="_blank">
        <img src="https://shepherd.dev/github/ui-awesome/html-svg/coverage.svg" alt="Psalm Coverage">
    </a>
    <a href="https://github.styleci.io/repos/494495136?branch=main" target="_blank">
        <img src="https://github.styleci.io/repos/494495136/shield?branch=main" alt="Style ci">
    </a>           
</p>

It is used as the outermost element of SVG documents, but it can also be used to embed an SVG fragment inside an SVG
or `HTML` document.


```php
use UIAwesome\Html\Graphic\Svg;

echo Svg::widget()
    ->class('hidden')
    ->filePath(__DIR__ . '/svg/moon.svg')
    ->fill('currentColor')
    ->height(32)
    ->id('theme-toggle-dark-icon')
    ->width(32);
```

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run

```shell
composer require --prefer-dist "ui-awesome/html-svg":"^0.1"
```

or add

```json
"ui-awesome/html-svg": "^0.1"
```

to the require section of your `composer.json` file. 

## Usage

Instantiate the `Svg` class using `Svg::widget()`.

```php
$svg = Svg::widget();
```

### Setting Attributes

Use the provided methods to set specific attributes for the a element.

```php
// setting class attribute
$svg->class('container');
```

Or, use the `attributes` method to set multiple attributes at once.

```php
$svg->attributes(['class' => 'container', 'style' => 'background-color: #eee;']);
```

### Adding Content

If you want to include content within the `svg` tag, use the `content` method.

```php
$svg->content('MyContent');
```

### Rendering

Generate the `HTML` output using the `render` method, for simple instantiation. 

```php
$html = $svg->render();
```

Or, use the magic `__toString` method.

```php
$html = (string) $svg;
```

### Common Use Cases

Below are examples of common use cases:

```php
// adding multiple attributes
$svg->class('external')->content('MyContent');

// setting the file path for the `HTML` output
$svg->filePath('/path/to/file')->render();
```

Explore additional methods for setting various attributes such as `fill`, `heigth`, `lang`, `name`, `style`, `title`,
`viewbox`, `width`, `xmlns`, etc.

### Attributes

Refer to the [Attribute Tests](https://github.com/ui-awesome/svg/blob/main/tests/AttributeTest.php) for comprehensive
examples.

The following methods are available for setting attributes:

| Method            | Description                                                                                      |
| ----------------- | ------------------------------------------------------------------------------------------------ |
| `attributes()`    | Set multiple `attributes` at once.                                                               |
| `class()`         | Set the `class` attribute.                                                                       |
| `content()`       | Set the `content` within the `svg` element.                                                      |
| `fill()`          | Set the `fill` attribute.                                                                        |
| `height()`        | Set the `height` attribute.                                                                      |
| `id()`            | Set the `id` attribute.                                                                          |
| `lang()`          | Set the `lang` attribute.                                                                        |
| `name()`          | Set the `name` attribute.                                                                        |
| `stroke()`        | Set the `stroke` attribute.                                                                      |
| `style()`         | Set the `style` attribute.                                                                       |
| `title()`         | Set the `title` attribute.                                                                       |
| `viewBox()`       | Set the `viewBox` attribute.                                                                     |
| `width()`         | Set the `width` attribute.                                                                       |
| `xmlns()`         | Set the `xmlns` attribute.                                                                       |

## Custom methods

Refer to the [Custom Methods Tests](https://github.com/ui-awesome/svg/blob/main/tests/CustomMethodTest.php) for 
comprehensive examples.

The following methods are available for customizing the `HTML` output:

| Method      | Description                                                                                            |
| ----------- | ------------------------------------------------------------------------------------------------------ |
| `filePath()`| Set the file path for the `HTML` output.                                                               |
| `render()`  | Generates the `HTML` output.                                                                           |
| `widget()`  | Instantiates the `Svg::class`.      

## Testing

[Check the documentation testing](docs/testing.md) to learn about testing.

## Support versions

[![PHP81](https://img.shields.io/badge/PHP-%3E%3D8.1-787CB5)](https://www.php.net/releases/8.1/en.php)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

## Our social networks

[![Twitter](https://img.shields.io/badge/twitter-follow-1DA1F2?logo=twitter&logoColor=1DA1F2&labelColor=555555?style=flat)](https://twitter.com/Terabytesoftw)
