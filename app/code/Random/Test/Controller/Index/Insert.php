<?php

namespace Random\Test\Controller\Index;

class Insert extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_studentRepository;
    protected $_studentFactory;
    protected $_cacheTypeList;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Random\Test\Model\StudentRepository $studentRepository,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \Random\Test\Model\StudentFactory $studentFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_studentRepository = $studentRepository;
        $this->_cacheTypeList = $cacheTypeList;
        $this->_studentFactory = $studentFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->getRequest()->getPostValue();

        if (!empty($post)) {

            $student = $this->_studentFactory->create();
            $student->setName($post['name']);
            $student->setAddress($post['address']);
            $student->setStatus($post['status']);
            $student->setCreatedAt(date('Y-m-d H:i:s'));
            $this->_studentRepository->save($student);

            $types = array('full_page');
            foreach ($types as $type) {
                $this->_cacheTypeList->cleanType($type);
            }

            return $this->_redirect('test/index/index');
        }

        // $types = array('config', 'layout', 'block_html', 'collections', 'reflection', 'db_ddl', 'compiled_config', 'eav', 'config_integration', 'config_integration_api', 'full_page', 'translate', 'config_webservice', 'vertex');

        // foreach ($this->_cacheFrontendPool as $cacheFrontend) {
        //     $cacheFrontend->getBackend()->clean();
        // }

        return $this->_pageFactory->create();
    }
}
