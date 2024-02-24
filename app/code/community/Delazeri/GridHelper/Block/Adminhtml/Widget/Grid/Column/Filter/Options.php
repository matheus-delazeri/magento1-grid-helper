<?php

class Delazeri_GridHelper_Block_Adminhtml_Widget_Grid_Column_Filter_Options
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Filter_Select
{

    protected static $_htmlPrefix = "grid-helper";
    protected static $_valuesDelimiter = ";";

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('delazeri/gridhelper/widget/grid/column/filter/options.phtml');
    }

    public static function getHtmlPrefix()
    {
        return self::$_htmlPrefix;
    }

    public static function getValuesDelimiter()
    {
        return self::$_valuesDelimiter;
    }

    protected function _getDropdownId()
    {
        return sprintf("%s-filter-dropdown",
            $this->_getHtmlId()
        );
    }

    protected function _getValuesDivId()
    {
        return sprintf("%s-values",
            $this->_getHtmlId()
        );
    }

    public function getHtml()
    {
        return $this->toHtml();
    }

    protected function _getOptions()
    {
        $options = parent::_getOptions();
        array_shift($options);

        return $options;
    }

    /**
     * Allows filtering by one or more values.
     *
     * This method will try to explode the value being
     * filtered using the return of the method
     * 'getValuesDelimiter' as the delimiter.
     *
     * @param Varien_Data_Collection_Db $collection
     * @param Mage_Adminhtml_Block_Widget_Grid_Column $column
     */
    public function filterMultipleValuesCallback($collection, $column)
    {
        $values = explode(self::getValuesDelimiter(), $column->getFilter()->getValue());

        $collection->addFieldToFilter($column->getIndex(), array_map(function ($value) {
                return ['like' => "%$value%"];
            }, $values)
        );

        return $this;
    }
}