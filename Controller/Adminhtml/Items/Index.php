<?php
namespace Test\Job\Controller\Adminhtml\Items;

class Index extends \Test\Job\Controller\Adminhtml\Items
{
    /**
     * Items list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Test_Job::test');
        $resultPage->getConfig()->getTitle()->prepend(__('Resume'));
        $resultPage->addBreadcrumb(__('Job'), __('Application'));
        $resultPage->addBreadcrumb(__('Resume'), __('Resume'));
        return $resultPage;
    }
}