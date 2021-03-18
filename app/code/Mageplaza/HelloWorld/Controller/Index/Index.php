<?php

namespace Mageplaza\HelloWorld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_postFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Mageplaza\HelloWorld\Model\PostFactory $postFactory
	) {
		$this->_pageFactory = $pageFactory;
		$this->_postFactory = $postFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$data = [
			'name' => 4,
			'url_key' => 4,
			'post_content' => 4,
			'tags' => 4,
			'status' => 1,
			'created_at' => date('Y-m-d H:i:s')
		];
		$post = $this->_postFactory->create();
		$post->setData($data)->save();
		// $post->setUrlKey(2);
		// $post->setPostContent(2);
		// $post->setTags(2);
		// $post->setStatus(2);
		// $post->setFeaturedImage(2);
		// $post->setCreatedAt(date('Y-m-d H:i:s'));
		// $post->setUpdatedAt(date('Y-m-d H:i:s'));
		// $this->_postFactory->save($post);
		// var_dump($result);
		// return $this->_pageFactory->create();
	}
}
