<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agregarfechas extends Migration
{
    public function up()
    {
        $this->forge->addColumn('empleados', [
            'created_at' => [
                'type' => 'DATETIME',
                'after' => 'id_tipo_usuario' //orden de la tabla, donde va esta columna
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'after' => 'created_at'
            ],

        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('empleados', 'updated_at');
        $this->forge->dropColumn('empleados', 'created_at');
    }
}
