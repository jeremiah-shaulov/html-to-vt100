# html-to-vt100

Convert HTML to VT100 terminal codes, to print colored and styled messages.

## Installation

Create a directory for your application, `cd` to it, and issue:

```bash
composer require jeremiah-shaulov/html-to-vt100
```

## Example

```php
<?php

require_once 'vendor/autoload.php';
use Vt100;

// to output
echo Vt100::from_html('aaa<b style="color:magenta">BBB</b>ccc');

// to error log
error_log(Vt100::from_html('aaa<b style="color:magenta">BBB</b>ccc'));
```

CLI applications can echo messages to terminal. Web applications can write them to error log, or to a custom log file, and then view it with

```bash
less -r filename.log
```

## What supported

Limited subset of HTML is supported:

- `<b>bold</b>`
- `<i>italic</i>`
- `<u>underlined</u>`
- `<blink>blink</blink>` - Most modern terminals don't support this.
- `<em>inverse fg/bg</em>`
- `<span style="color: magenta">` - Produces classic escape codes for black, red, green, yellow, blue, magenta, cyan and white. For other HTML colors - nonclassic.
- `<span style="color: #AABBCC">` - Produces nonclassic escape codes.
- `<span style="background-color: magenta">`
- `<span style="background-color: #AABBCC">`
- `<b>bold <span style="font-weight: normal">normal</span></b>`
- `<i>italic <span style="font-style: normal">normal</span></i>`
- `<u>underlined <span style="text-decoration: none">normal</span></u>`
- `<font color=blue>blue</font>`

## API

Namespace Vt100 contains one class called Vt100 with 2 static functions:

```php
public static function from_html($str); // Converts HTML to VT100 escape codes.

public static function to_html($str); // Converts VT100 escape codes produced by from_html() back to HTML.
```
