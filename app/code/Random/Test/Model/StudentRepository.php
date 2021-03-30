<?php

namespace Random\Test\Model;

class StudentRepository
{
    protected $resource;

    protected $studentFactory;

    protected $studentCollection;

    public function __construct(
        \Random\Test\Model\ResourceModel\Student $resource,
        \Random\Test\Model\StudentFactory $studentFactory,
        \Random\Test\Model\ResourceModel\Student\CollectionFactory $studentCollection
    ) {
        $this->resource = $resource;
        $this->studentFactory = $studentFactory;
        $this->studentCollection = $studentCollection;
    }

    public function save(\Random\Test\Model\Student $student)
    {
        $this->resource->save($student);
    }


    public function getById($studentId)
    {
        $student = $this->studentFactory->create();
        $this->resource->load($student, $studentId);

        return $student;
    }

    public function getList()
    {
        return $this->studentCollection->create();
    }

    public function deleteById($studentId)
    {
        return $this->resource->delete($this->getById($studentId));
    }


    // private function getCollectionProcessor()
    // {
    //     if (!$this->collectionProcessor) {
    //         $this->collectionProcessor = \Magento\Framework\App\ObjectManager::getInstance()->get(
    //             'Magento\Cms\Model\Api\SearchCriteria\BlockCollectionProcessor'
    //         );
    //     }
    //     return $this->collectionProcessor;
    // }
}
