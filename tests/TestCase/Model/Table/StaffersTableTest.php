<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaffersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaffersTable Test Case
 */
class StaffersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StaffersTable
     */
    public $Staffers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Staffers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Staffers') ? [] : ['className' => StaffersTable::class];
        $this->Staffers = TableRegistry::getTableLocator()->get('Staffers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Staffers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
