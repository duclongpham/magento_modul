<?php

namespace Aht\Test\Model;

class Student extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'aht_test_student';

    protected $_cacheTag = 'aht_test_student';

    protected $_eventPrefix = 'aht_test_student';

    protected function _construct()
    {
        $this->_init('Aht\Test\Model\ResourceModel\Student');
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
