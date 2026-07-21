<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePromotion extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [ 'type' => 'INTEGER', 'constraint' => 11, 'auto_increment' => true, ],
            'pourcentage' => [ 'type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('promotion');
    }

    public function down()
    {
        $this->forge->dropTable('promotion');
    }
}
