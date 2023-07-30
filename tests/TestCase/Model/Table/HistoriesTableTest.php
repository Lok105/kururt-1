<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistoriesTable Test Case
 */
class HistoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HistoriesTable
     */
    public $Histories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Histories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Histories') ? [] : ['className' => HistoriesTable::class];
        $this->Histories = TableRegistry::getTableLocator()->get('Histories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Histories);

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
