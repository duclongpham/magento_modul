<?php

namespace Aht\Test\Model\ResourceModel;


class Student extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('aht_test_student', 'student_id');
    }
}
