<?php
use Migrations\AbstractMigration;

class CreateVariants extends AbstractMigration
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
        $table = $this->table('variants');
        $table->addColumn('question_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('content', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addForeignKey('question_id', 'questions', 'id');
        $table->addPrimaryKey([
            'id',
            'question_id',
        ]);
        $table->create();
    }
}
