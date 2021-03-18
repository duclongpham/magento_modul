<?php

namespace Aht\Test\Controller\Index;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_studentRepository;
    protected $_studentFactory;
    protected $_coreRegistry;
    protected $_cacheTypeList;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Aht\Test\Model\StudentRepository $studentRepository,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_studentRepository = $studentRepository;
        $this->_coreRegistry = $coreRegistry;
        $this->_cacheTypeList = $cacheTypeList;
        return parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->_request->getParam('id');
        $this->_studentRepository->deleteById($id);

        // $types = array('config', 'layout', 'block_html', 'collections', 'reflection', 'db_ddl', 'compiled_config', 'eav', 'config_integration', 'config_integration_api', 'full_page', 'translate', 'config_webservice', 'vertex');
        $types = array('full_page');
        foreach ($types as $type) {
            $this->_cacheTypeList->cleanType($type);
        }
        // foreach ($this->_cacheFrontendPool as $cacheFrontend) {
        //     $cacheFrontend->getBackend()->clean();
        // }

        return $this->_redirect('test/index/index');
    }
}
