<?php

namespace Random\Test\Model;

class Student extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'Random_test_student';

    protected $_cacheTag = 'Random_test_student';

    protected $_eventPrefix = 'Random_test_student';

    protected function _construct()
    {
        $this->_init('Random\Test\Model\ResourceModel\Student');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
