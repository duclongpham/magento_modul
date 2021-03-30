<?php

namespace Random\Test\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_studentFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Random\Test\Model\StudentFactory $studentFactory
    ) {
        $this->_studentFactory = $studentFactory;
        parent::__construct($context);
    }

    public function getCollection()
    {
        $student = $this->_studentFactory->create();
        return $student->getCollection();
    }
}
