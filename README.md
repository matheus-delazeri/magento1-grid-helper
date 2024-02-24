# Magento 1 Grid Helper

This is a very simple Magento 1 module that provides a new filter which allows filtering **any** grid column of type **_"Options"_** by more than one value at once!
For example, this module rewrites the admin sales grid to add this new feature to the "Status" column:

![image](https://github.com/matheus-delazeri/magento1-grid-helper/assets/55641441/0d172f95-e1da-4ba3-bfbd-293fa273f2da)

This way you can filter the grid by more than one status option at once 😄

It also rewrites the catalog grid to make it possible to filter by more than one product type at time:

![image](https://github.com/matheus-delazeri/magento1-grid-helper/assets/55641441/f4971272-de03-4602-bc49-cd2701925c94)

## Adding to your grid

You can add this new filter to **any** grid's column of type _"**Options"**_ in a **VERY** easy way: just paste the _**"filter"**_ and _**"filter_condition_callback"**_ parameters in the creation of your column:
```php
...
$this->addColumn({column_id}, array(
      ...
      'type' => 'options',
      'options' => ['foo', 'bar'], 
      'filter' => 'gridhelper/adminhtml_widget_grid_column_filter_options',
      'filter_condition_callback' => [Delazeri_GridHelper_Block_Adminhtml_Widget_Grid_Column_Filter_Options::class, 'filterMultipleValuesCallback']
));
...
```
And you are good to go!🥳 

e.g: Configuration of the "Status" column in the admin sales grid:
```php
...
$this->addColumn('status', array(
      'header' => Mage::helper('sales')->__('Status'),
      'index' => 'status',
      'type'  => 'options',
      'width' => '70px',
      'options' => Mage::getSingleton('sales/order_config')->getStatuses(),
      /** Delazeri_GridHelper configuration bellow */
      'filter' => 'gridhelper/adminhtml_widget_grid_column_filter_options',
      'filter_condition_callback' => [Delazeri_GridHelper_Block_Adminhtml_Widget_Grid_Column_Filter_Options::class, 'filterMultipleValuesCallback']
));
...
```
