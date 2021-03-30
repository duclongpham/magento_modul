<?php

namespace Random\Test\Controller\Index;

use Random\Test\Model\StudentRepository;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_studentRepository;
    protected $_student;
    protected $_studentFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Random\Test\Model\StudentRepository $studentRepository,
        \Random\Test\Model\StudentFactory $studentFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_studentRepository = $studentRepository;
        $this->_studentFactory = $studentFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
