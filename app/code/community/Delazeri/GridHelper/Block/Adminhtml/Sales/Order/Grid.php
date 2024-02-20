<?php

class Delazeri_GridHelper_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Sales_Order_Grid
{
    protected function _prepareColumns()
    {
        parent::_prepareColumns();
        $column = $this->getColumn('status')->addData([
            'width' => '100px',
            'filter' => 'gridhelper/adminhtml_widget_grid_column_filter_options',
            'filter_condition_callback' => [Delazeri_GridHelper_Block_Adminhtml_Widget_Grid_Column_Filter_Options::class, 'filterMultipleValuesCallback']
        ]);
        $this->addColumn('status', $column->toArray());

        return $this;
    }
}