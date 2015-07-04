# Yii2 Material Design Icons Asset Bundle
The extension provides Asset Bundle for Yii2-Framework with 
[Google Material Design Icons](https://github.com/google/material-design-icons) and Icon helper for 
use icons font in [Bootsrtap-style](https://github.com/mervick/material-design-icons#where-are-two-ways-to-usage)".

## Installation
Recommended way to install via [composer](https://getcomposer.org/):
```bash
$ composer require "mervick/yii2-material-design-icons" "~1.0"
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

echo MD::icon(MD::_ACCESS_ALARM); // <i class="mdi mdi-access-alarm"></i>
echo MD::icon(
    'keyboard-arrow-left', // equal to MD::_KEYBOARD_ARROW_LEFT
    ['class' => 'big', 'data-role' => 'arrow']
); // <i class="big mdi mdi-keyboard-arrow-left" data-role="arrow"></i>

echo Html::submitButton(
    Yii::t('app', '{icon} Save', ['icon' => MD::icon(MD::_CHECK)])
); // <button type="submit"><i class="mdi mdi-check"></i> Save</button>

// use other tags
echo MD::icon(MD::_EQUALIZER)->tag('span'); // <span class="mdi mdi-equalizer"></span>
echo MD::icon(MD::_EQUALIZER, ['tag' => 'span']); // <span class="mdi mdi-equalizer"></span>

echo MD::icon(MD::_VERIFIED_USER, ['class' => 'form-control-feedback'])->tag('span'); 
// <span class="mdi mdi-verified-user form-control-feedback"></span>


echo MD::icon(MD::_ACCESS_ALARM)->inverse();    // <i class="mdi mdi-access-alarm mdi-inverse"></i>
echo MD::icon(MD::_ACCESS_ALARM)->spin();       // <i class="mdi mdi-access-alarm mdi-spin"></i>
echo MD::icon(MD::_ACCESS_ALARM)->fixedWidth(); // <i class="mdi mdi-access-alarm mdi-fw"></i>
echo MD::icon(MD::_ACCESS_ALARM)->border();     // <i class="mdi mdi-access-alarm mdi-border"></i>
echo MD::icon(MD::_ACCESS_ALARM)->pullLeft();   // <i class="mdi mdi-access-alarm pull-left"></i>
echo MD::icon(MD::_ACCESS_ALARM)->pullRight();  // <i class="mdi mdi-access-alarm pull-right"></i>

echo MD::icon(MD::_ACCESS_ALARM)->size(MD::SIZE_3X);
// values: MD::SIZE_LARGE, MD::SIZE_2X, MD::SIZE_3X, MD::SIZE_4X, MD::SIZE_5X
// <i class="mdi mdi-access-alarm mdi-3x"></i>

echo MD::icon(MD::_ACCESS_ALARM)->rotate(MD::ROTATE_90); 
// values: MD::ROTATE_90, MD::ROTATE_180, MD::ROTATE_180
// <i class="mdi mdi-access-alarm mdi-rotate-90"></i>

echo MD::icon(MD::_ACCESS_ALARM)->flip(MD::FLIP_VERTICAL); 
// values: MD::FLIP_HORIZONTAL, MD::FLIP_VERTICAL
// <i class="mdi mdi-access-alarm mdi-flip-vertical"></i>

echo MD::icon(MD::_ACCESS_ALARM)
        ->spin()
        ->fixedWidth()
        ->pullLeft()
        ->size(MD::SIZE_LARGE);
// <i class="mdi mdi-access-alarm mdi-spin mdi-fw pull-left mdi-lg"></i>

echo MD::stack()
        ->icon('twitter')
        ->on('square-o');
// <span class="mdi-stack">
//   <i class="mdi mdi-square-o mdi-stack-2x"></i>
//   <i class="mdi mdi-twitter mdi-stack-1x"></i>
// </span>

echo MD::stack(['data-role' => 'stacked-icon'])
     ->on((new MD\Icon('square'))->inverse())
     ->icon((new MD\Icon(MD::_ACCESS_ALARM))->spin());
// <span class="mdi-stack" data-role="stacked-icon">
//   <i class="mdi mdi-square-o mdi-inverse mdi-stack-2x"></i>
//   <i class="mdi mdi-cog mdi-spin mdi-stack-1x"></i>
// </span>

// autocomplete icons name in IDE
echo MD::icon(MD::_COG);
echo MD::icon(MD::_DESKTOP);
echo MD::stack()
     ->on((new MD\Icon(MD::_SQUARE))->inverse())
     ->icon((new MD\Icon(MD::_COG))->spin());
```
