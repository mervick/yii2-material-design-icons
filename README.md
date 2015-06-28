# Yii2 Material Design Icons Asset Bundle
The extension provides Asset Bundle for Yii2-Framework with 
[Google Material Design Icons](https://github.com/google/material-design-icons) and Icon helper for 
use icons font in [Bootsrtap-style](https://github.com/mervick/material-design-icons#where-are-two-ways-to-usage)".

## Installation
Recommended way to install via [composer](https://getcomposer.org/):
```bash
$ composer require "mervick/yii2-material-design-icons" "*"
```

## Usage
Register AssetBundle in your view:
```php
yii\materialicons\AssetBundle::register($this);
```
or as dependency in yours AssetBundle:
```php
class AppAsset extends \yii\web\AssetBundle
{
    // ...
    public $depends = [
        // ...
        '\\yii\\materialicons\\AssetBundle'
    ];
    // ...
}
```

## Helper

```php
use yii\materialicons\MD;

echo MD::icon(MD::_ACCESS_ALARM); // <i class="md md-access-alarm"></i>
echo MD::icon(
    'keyboard-arrow-left', // equal to MD::_KEYBOARD_ARROW_LEFT
    ['class' => 'big', 'data-role' => 'arrow']
); // <i class="big md md-keyboard-arrow-left" data-role="arrow"></i>

echo Html::submitButton(
    Yii::t('app', '{icon} Save', ['icon' => MD::icon(MD::_CHECK)])
); // <button type="submit"><i class="md md-check"></i> Save</button>

// use other tags
echo MD::icon(MD::_EQUALIZER)->tag('span'); // <span class="md md-equalizer"></span>
echo MD::icon(MD::_EQUALIZER, ['tag' => 'span']); // <span class="md md-equalizer"></span>

echo MD::icon(MD::_VERIFIED_USER, ['class' => 'form-control-feedback'])->tag('span'); 
// <span class="md md-verified-user form-control-feedback"></span>


echo MD::icon(MD::_ACCESS_ALARM)->inverse();    // <i class="md md-access-alarm md-inverse"></i>
echo MD::icon(MD::_ACCESS_ALARM)->spin();       // <i class="md md-access-alarm md-spin"></i>
echo MD::icon(MD::_ACCESS_ALARM)->fixedWidth(); // <i class="md md-access-alarm md-fw"></i>
echo MD::icon(MD::_ACCESS_ALARM)->border();     // <i class="md md-access-alarm md-border"></i>
echo MD::icon(MD::_ACCESS_ALARM)->pullLeft();   // <i class="md md-access-alarm pull-left"></i>
echo MD::icon(MD::_ACCESS_ALARM)->pullRight();  // <i class="md md-access-alarm pull-right"></i>

echo MD::icon(MD::_ACCESS_ALARM)->size(MD::SIZE_3X);
// values: MD::SIZE_LARGE, MD::SIZE_2X, MD::SIZE_3X, MD::SIZE_4X, MD::SIZE_5X
// <i class="md md-access-alarm md-3x"></i>

echo MD::icon(MD::_ACCESS_ALARM)->rotate(MD::ROTATE_90); 
// values: MD::ROTATE_90, MD::ROTATE_180, MD::ROTATE_180
// <i class="md md-access-alarm md-rotate-90"></i>

echo MD::icon(MD::_ACCESS_ALARM)->flip(MD::FLIP_VERTICAL); 
// values: MD::FLIP_HORIZONTAL, MD::FLIP_VERTICAL
// <i class="md md-access-alarm md-flip-vertical"></i>

echo MD::icon(MD::_ACCESS_ALARM)
        ->spin()
        ->fixedWidth()
        ->pullLeft()
        ->size(MD::SIZE_LARGE);
// <i class="md md-access-alarm md-spin md-fw pull-left md-lg"></i>
```
