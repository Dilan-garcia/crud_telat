<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tipo_usuario' => 'Administrativos'

            ],
            [
                'tipo_usuario' => 'Administrativos_Operativos'

            ],
            [
                'tipo_usuario' => 'Operativos'

            ]
        ];

        $this->db->table('usuarios')->insertBatch($data);

    }
}
