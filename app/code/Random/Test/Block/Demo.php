<?php

namespace Random\Test\Block;

class Demo extends \Magento\Framework\View\Element\Template
{
    private $layerResolver;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\Layer\Resolver $layerResolver,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->layerResolver = $layerResolver;
    }

    public function getCurrentCategory()
    {
        return $this->layerResolver->get()->getCurrentCategory();
    }
}
