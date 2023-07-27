<?php
namespace Test\Job\Block;

/**
 * Job content block
 */
class Job extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    ) {
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Job Application'));
        
        return parent::_prepareLayout();
    }
}
