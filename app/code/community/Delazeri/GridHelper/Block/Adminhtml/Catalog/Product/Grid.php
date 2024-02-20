<?php

class Delazeri_GridHelper_Block_Adminhtml_Catalog_Product_Grid extends Mage_Adminhtml_Block_Catalog_Product_Grid
{

    protected function _prepareColumns()
    {
        parent::_prepareColumns();
        $column = $this->getColumn('type')->addData([
            'filter' => 'gridhelper/adminhtml_widget_grid_column_filter_options',
            'filter_condition_callback' => [Delazeri_GridHelper_Block_Adminhtml_Widget_Grid_Column_Filter_Options::class, 'filterMultipleValuesCallback']
        ]);
        $this->addColumn('type', $column->toArray());

        return $this;
    }

}
