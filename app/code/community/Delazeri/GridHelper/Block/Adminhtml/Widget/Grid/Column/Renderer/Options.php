<?php

abstract class GetCommerce_Reports_Block_Adminhtml_Widget_Grid_Column_Renderer_Options extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    /**
     * Return a key-value array with the possible options for
     * the field.
     *
     * e.g: [0 => 'No', 1 => 'Yes']
     *
     * @return array
     */
    abstract public function getOptions();

    public function render(Varien_Object $row)
    {
        $options = $this->getOptions();
        if (isset($options[$this->_getValue($row)])) {
            return $options[$this->_getValue($row)];
        }

        return parent::render($row);
    }

}