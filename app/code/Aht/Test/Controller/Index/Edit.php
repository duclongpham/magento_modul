<?php

namespace Aht\Test\Controller\Index;

class Edit extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_coreRegistry;
    protected $_cacheTypeList;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Registry $coreRegistry,
        \Aht\Test\Model\StudentFactory $studentFactory,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->_studentFactory = $studentFactory;
        $this->_cacheTypeList = $cacheTypeList;
        return parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->_request->getParam('id');
        $this->_coreRegistry->register('student_id', $id);

        // $types = array('config', 'layout', 'block_html', 'collections', 'reflection', 'db_ddl', 'compiled_config', 'eav', 'config_integration', 'config_integration_api', 'full_page', 'translate', 'config_webservice', 'vertex');
        $types = array('full_page');
        foreach ($types as $type) {
            $this->_cacheTypeList->cleanType($type);
        }
        // foreach ($this->_cacheFrontendPool as $cacheFrontend) {
        //     $cacheFrontend->getBackend()->clean();
        // }

        return $this->_pageFactory->create();
    }
}
