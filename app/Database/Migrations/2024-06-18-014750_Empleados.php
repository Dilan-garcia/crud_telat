<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Empleados extends Migration
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
            'clave' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true

            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'apellidos' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'sexo' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ],
            'cp' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'colonia' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'delegacion_municipio' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'id_tipo_usuario' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_tipo_usuario', 'usuarios', 'id');
        $this->forge->createTable('empleados');
    }

    public function down()
    {
        $this->forge->dropTable('empleados');
    }
}
