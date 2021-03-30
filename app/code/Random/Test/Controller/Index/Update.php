<?php

namespace Random\Test\Controller\Index;

class Update extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_studentRepository;
    protected $_studentFactory;
    protected $_cacheTypeList;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Random\Test\Model\StudentRepository $studentRepository,
        \Random\Test\Model\StudentFactory $studentFactory,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_studentRepository = $studentRepository;
        $this->_studentFactory = $studentFactory;
        $this->_cacheTypeList = $cacheTypeList;
        return parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->getRequest()->getPostValue();

        $id = $this->_request->getParam('id');

        if (!empty($post)) {
            $student = $this->_studentRepository->getById($id);
            $student->setName($post['name']);
            $student->setAddress($post['address']);
            $student->setStatus($post['status']);
            $this->_studentRepository->save($student);
        }

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
