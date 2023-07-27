<?php
namespace Test\Job\Model\ResourceModel\Job;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'job_id';
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Test\Job\Model\Job',
            'Test\Job\Model\ResourceModel\Job'
        );
    }
}