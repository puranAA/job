<?php
namespace Test\Job\Model\ResourceModel;

class Job extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('test_job', 'job_id');
    }
}