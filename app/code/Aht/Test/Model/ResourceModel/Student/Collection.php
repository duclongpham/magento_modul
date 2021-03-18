<?php

namespace Aht\Test\Model\ResourceModel\Student;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'student_id';
    protected $_eventPrefix = 'aht_test_student_collection';
    protected $_eventObject = 'student_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Aht\Test\Model\Student', 'Aht\Test\Model\ResourceModel\Student');
    }
}
