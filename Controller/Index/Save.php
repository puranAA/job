<?php
namespace Test\Job\Controller\Index;

use Magento\Framework\App\Action\Context;
use Test\Job\Model\JobFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;

class Save extends \Magento\Framework\App\Action\Action
{
	/**
     * @var Job
     */
    protected $_job;
    protected $uploaderFactory;
    protected $adapterFactory;
    protected $filesystem;

    public function __construct(
		Context $context,
        JobFactory $job,
        UploaderFactory $uploaderFactory,
        AdapterFactory $adapterFactory,
        Filesystem $filesystem
    ) {
        $this->_job = $job;
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        parent::__construct($context);
    }
	public function execute()
    {
        $data = $this->getRequest()->getParams();
        if(isset($_FILES['resume']['name']) && $_FILES['resume']['name'] != '') {
            try{
                $uploaderFactory = $this->uploaderFactory->create(['fileId' => 'resume']);
                $uploaderFactory->setAllowedExtensions(['doc','docx']);
                $imageAdapter = $this->adapterFactory->create();
                $uploaderFactory->setAllowCreateFolders(true);
                $uploaderFactory->setAllowRenameFiles(true);
                $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
                $destinationPath = $mediaDirectory->getAbsolutePath('test/job/');
                $result = $uploaderFactory->save($destinationPath);
                if (!$result) {
                    throw new LocalizedException(
                        __('File cannot be saved to path: $1', $destinationPath)
                    );
                }
                
                $imagePath = 'test/job/'.$result['file'];
                $data['resume'] = $imagePath;
            } catch (\Exception $e) {
            }
        }
    	$job = $this->_job->create();
        $job->setData($data);
        if($job->save()){
            $this->messageManager->addSuccessMessage(__('Resume saved successfully.'));
        }else{
            $this->messageManager->addErrorMessage(__('resume was not saved.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('job');
        return $resultRedirect;
    }
}
