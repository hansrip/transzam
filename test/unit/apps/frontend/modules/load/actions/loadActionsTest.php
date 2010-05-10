<?php
require_once 'PHPUnit/Framework.php';

require_once dirname(__FILE__).'/../../../../../../../apps/frontend/modules/load/actions/actions.class.php';

/**
 * Test class for loadActions.
 * Generated by PHPUnit on 2010-05-06 at 22:27:16.
 */
class loadActionsTest extends PHPUnit_Framework_TestCase {
    /**
     * @var loadActions
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new loadActions;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
    }

    /**
     * Generated from @assert (1) == 0.
     */
    public function testExecuteIndex() {
        $this->assertEquals(
                0,
                $this->object->executeIndex(1)
        );
    }

    /**
     * Generated from @assert (2) == 1.
     */
    public function testExecuteIndex2() {
        $this->assertEquals(
                1,
                $this->object->executeIndex(2)
        );
    }

    /**
     * Generated from @assert (1, 0) == 1.
     */
    public function testExecuteIndex3() {
        $this->assertEquals(
                1,
                $this->object->executeIndex(1, 0)
        );
    }

    /**
     * Generated from @assert (1, 1) == 2.
     */
    public function testExecuteIndex4() {
        $this->assertEquals(
                2,
                $this->object->executeIndex(1, 1)
        );
    }

    /**
     * Generated from @assert (1, 2) == 4.
     */
    public function testExecuteIndex5() {
        $this->assertEquals(
                4,
                $this->object->executeIndex(1, 2)
        );
    }

    /**
     * @todo Implement testExecuteShow().
     */
    public function testExecuteShow() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testExecuteNew().
     */
    public function testExecuteNew() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testExecuteCreate().
     */
    public function testExecuteCreate() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testExecuteEdit().
     */
    public function testExecuteEdit() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testExecuteUpdate().
     */
    public function testExecuteUpdate() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testExecuteDelete().
     */
    public function testExecuteDelete() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }
}
?>
