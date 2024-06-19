<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TipoUsuario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'tipo_usuario' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'descripcion' => [
                'type' => 'TINYTEXT',
                'null' => true,
            ]

        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
