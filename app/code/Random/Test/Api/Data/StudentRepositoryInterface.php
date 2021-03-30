<?php

namespace Random\Test\Api\Data;

interface StudentRepositoryInterface
{
    /**
     * Save student.
     *
     * @param \Random\Test\Model\Student $student
     * @return void
     */
    public function save(\Random\Test\Model\Student $student);

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
     * @param \Random\Test\Model\Student $student
     * @return bool
     */
    public function delete(\Random\Test\Model\Student $student);
}
