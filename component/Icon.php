<?php

namespace yii\materialicons\component;

use yii\materialicons\MD;
use yii\helpers\Html;
use yii\base\InvalidParamException;


/**
 * Class Icon
 * @package yii\materialicons\component
 */
class Icon
{
    /** @var array Html options */
    private $options = [];

    /** @var string Html tag */
    private $tag = 'i';


    /**
     * @param string $icon
     * @param array $options
     */
    public function __construct($icon, $options = [])
    {
        if (isset($options['tag'])) {
            if (is_string($options['tag'])) {
                $this->tag = $options['tag'];
            }
            unset($options['tag']);
        }

        Html::addCssClass($options, MD::$cssPrefix . ' ' . MD::$cssPrefix . '-' . $icon);
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return Image
     */
    public function inverse()
    {
        return $this->addCssClass(MD::$cssPrefix . '-inverse');
    }

    /**
     * @return Image
     */
    public function spin()
    {
        return $this->addCssClass(MD::$cssPrefix . '-spin');
    }

    /**
     * @return Image
     */
    public function fixedWidth()
    {
        return $this->addCssClass(MD::$cssPrefix . '-fw');
    }

    /**
     * @return Image
     */
    public function border()
    {
        return $this->addCssClass(MD::$cssPrefix . '-border');
    }

    /**
     * @return Image
     */
    public function pullLeft()
    {
        return $this->addCssClass('pull-left');
    }

    /**
     * @return Image
     */
    public function pullRight()
    {
        return $this->addCssClass('pull-right');
    }

    /**
     * @param string $value
     * @return Image
     * @throws InvalidParamException
     */
    public function size($value)
    {
        return $this->addCssClass(
            MD::$cssPrefix . '-' . $value,
            in_array((string)$value, [MD::SIZE_LARGE, MD::SIZE_2X, MD::SIZE_3X, MD::SIZE_4X, MD::SIZE_5X], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'MD::size()',
                'MD::SIZE_LARGE, MD::SIZE_2X, MD::SIZE_3X, MD::SIZE_4X, MD::SIZE_5X'
            )
        );
    }

    /**
     * @param string $value
     * @return Image
     * @throws InvalidParamException
     */
    public function rotate($value)
    {
        return $this->addCssClass(
            MD::$cssPrefix . '-rotate-' . $value,
            in_array((string)$value, [MD::ROTATE_90, MD::ROTATE_180, MD::ROTATE_270], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'MD::rotate()',
                'MD::ROTATE_90, MD::ROTATE_180, MD::ROTATE_270'
            )
        );
    }

    /**
     * @param string $value
     * @return Image
     * @throws InvalidParamException
     */
    public function flip($value)
    {
        return $this->addCssClass(
            MD::$cssPrefix . '-flip-' . $value,
            in_array((string)$value, [MD::FLIP_HORIZONTAL, MD::FLIP_VERTICAL], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'MD::flip()',
                'MD::FLIP_HORIZONTAL, MD::FLIP_VERTICAL'
            )
        );
    }

    /**
     * @param string $class
     * @param bool $condition
     * @param string|bool $throw
     * @return Icon
     * @throws InvalidParamException
     */
    public function addCssClass($class, $condition = true, $throw = false)
    {
        if ($condition === false) {
            if (!empty($throw)) {
                $message = !is_string($throw)
                    ? 'Condition is false'
                    : $throw;

                throw new InvalidParamException($message);
            }
        } else {
            Html::addCssClass($this->options, $class);
        }

        return $this;
    }

    /**
     * @param string $tag
     * @return Icon
     * @throws InvalidParamException
     */
    public function tag($tag)
    {
        if (is_string($tag)) {
            $this->tag = $tag;
        } else {
            throw new InvalidParamException(
                sprintf('Param tag expect type string, %s given ', gettype($tag))
            );
        }

        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        return Html::tag($this->tag, null, $this->options);
    }
}