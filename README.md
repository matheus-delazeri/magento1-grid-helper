# Magento 1 Grid Helper

This is a very simple Magento 1 module that provides a new filter which allows filtering **any** grid column of type **_"Options"_** by more than one value at once!
For example, this module rewrites the admin sales grid to add this new feature to the "Status" column:

![image](https://github.com/matheus-delazeri/magento1-grid-helper/assets/55641441/2ca09cbd-9ac2-414b-909c-c6514994d79f)

This way you can filter the grid by more than one status option at once 😄

It also rewrites the catalog grid to make it possible to filter by more than one product type at time:

![image](https://github.com/matheus-delazeri/magento1-grid-helper/assets/55641441/d4ed5512-6427-4ed0-a44c-15f9ff16f301)

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

* Configuration of the "Status" column in the admin sales grid:
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
