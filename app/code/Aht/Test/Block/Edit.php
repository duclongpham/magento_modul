<?php

namespace Aht\Test\Block;

class Edit extends \Magento\Framework\View\Element\Template
{
    protected $_studentFactory;
    protected $_coreRegistry;
    protected $_studentRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Aht\Test\Model\StudentFactory $studentFactory,
        \Magento\Framework\Registry $coreRegistry,
        \Aht\Test\Model\StudentRepository $studentRepository
    ) {
        $this->_studentFactory = $studentFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->_studentRepository = $studentRepository;

        parent::__construct($context);
    }

    public function getStudent()
    {
        $student = $this->_studentFactory->create();
        $id = $this->_coreRegistry->registry('student_id');

        return $this->_studentRepository->getById($id);
    }
}
