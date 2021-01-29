<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateService extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('service',['id' => 'id']);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ])
        ->addColumn('price', 'float', [
            'null' => false,
        ])
        ->addColumn('billing_period', 'int', [
            'default' => null,
            'limit' => 2,
            'null' => false,
        ])
            ->addColumn('date_start', 'date')
            ->addColumn('date_end', 'date')
            ->addTimestamps();
        $table->create();
    }
}
