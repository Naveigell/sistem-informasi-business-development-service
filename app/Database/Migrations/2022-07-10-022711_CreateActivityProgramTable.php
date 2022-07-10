<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateActivityProgramTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'content' => [
                'type' => 'LONGTEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('activity_programs');
    }

    public function down()
    {
        $this->forge->dropTable('activity_programs');
    }
}
