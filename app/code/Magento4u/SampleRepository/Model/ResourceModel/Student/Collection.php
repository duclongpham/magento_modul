<?php

namespace Magento4u\SampleRepository\Model\ResourceModel\Student;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento4u\SampleRepository\Model\ResourceModel\Student;

class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Magento4u\SampleRepository\Model\Student::class,
            Student::class
        );
    }
}
