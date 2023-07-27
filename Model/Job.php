<?php
namespace Test\Job\Model;

use Magento\Framework\Model\AbstractModel;

class Job extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Test\Job\Model\ResourceModel\Job');
    }
}