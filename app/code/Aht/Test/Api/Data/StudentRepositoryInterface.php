<?php

namespace Aht\Test\Api\Data;

interface StudentRepositoryInterface
{
    /**
     * Save student.
     *
     * @param \Aht\Test\Model\Student $student
     * @return void
     */
    public function save(\Aht\Test\Model\Student $student);

    /**
     * Save student.
     *
     * @param mix $block
     * @return object
     */
    public function getById($id);

    /**
     * get list student.
     *
     * @return object
     */
    public function getList();

    /**
     * delete student.
     *
     * @param \Aht\Test\Model\Student $student
     * @return bool
     */
    public function delete(\Aht\Test\Model\Student $student);
}
