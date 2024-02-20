<?php

class GetCommerce_Reports_Block_Adminhtml_Widget_Grid_Column_Renderer_Order_Status
    extends GetCommerce_Reports_Block_Adminhtml_Widget_Grid_Column_Renderer_Options
{

    function getOptions()
    {
        return Mage::getSingleton('sales/order_config')->getStatuses();
    }

}