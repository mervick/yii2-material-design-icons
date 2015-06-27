<?php

namespace yii\materialicons\component;

use yii\materialicons\MD;
use yii\helpers\Html;
use yii\base\InvalidParamException;


/**
 * Class Stack
 * @package yii\materialicons\component
 */
class Stack
{
    /** @var array  */
    private $options = [];

    /** @var Icon */
    private $icon_front;

    /** @var Icon */
    private $icon_back;

    /** @var string */
    private $tag = 'span';


    /**
     * @param array $options
     */
    public function __construct($options = [])
    {
        if (isset($options['tag'])) {
            if (is_string($options['tag'])) {
                $this->tag = $options['tag'];
            }
            unset($options['tag']);
        }

        Html::addCssClass($options, MD::$cssPrefix .'-stack');

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
     * @param string|Icon $icon
     * @param array $options
     * @return Stack
     */
    public function icon($icon, $options = [])
    {
        if (is_string($icon)) {
            $icon = new Icon($icon, $options);
        }

        $this->icon_front = $icon;

        return $this;
    }

    /**
     * @param string|Icon $icon
     * @param array $options
     * @return Stack
     */
    public function on($icon, $options = [])
    {
        if (is_string($icon)) {
            $icon = new Icon($icon, $options);
        }

        $this->icon_back = $icon;

        return $this;
    }

    /**
     * @param string $tag
     * @return Stack
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
        $icon_back = $this->icon_back instanceof Icon
            ? $this->icon_back->addCssClass(MD::$cssPrefix .'-stack-2x')
            : null;

        $icon_front = $this->icon_front instanceof Icon
            ? $this->icon_front->addCssClass(MD::$cssPrefix .'-stack-1x')
            : null;

        return Html::tag('span',
            $icon_back . $icon_front,
            $this->options
        );
    }
}