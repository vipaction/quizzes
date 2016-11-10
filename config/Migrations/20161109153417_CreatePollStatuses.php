<?php
use Migrations\AbstractMigration;

class CreatePollStatuses extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('poll_statuses');
        $table->addColumn('poll_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('status', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('updated', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addForeignKey('poll_id', 'polls', 'id');
        $table->addForeignKey('user_id', 'users', 'id');
        $table->addPrimaryKey([
            'id',
            'poll_id',
            'user_id',
        ]);
        $table->create();
    }
}
