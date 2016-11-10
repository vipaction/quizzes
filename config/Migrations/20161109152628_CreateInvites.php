<?php
use Migrations\AbstractMigration;

class CreateInvites extends AbstractMigration
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
        $table = $this->table('invites');
        $table->addColumn('inviter_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('invitee_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('target_poll_id', 'integer', [
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
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addForeignKey('inviter_id', 'users', 'id');
        $table->addForeignKey('invitee_id', 'users', 'id');
        $table->addForeignKey('target_poll_id', 'polls', 'id');
        $table->addPrimaryKey([
            'id',
            'invitee_id',
            'target_poll_id',
        ]);
        $table->create();
    }
}
