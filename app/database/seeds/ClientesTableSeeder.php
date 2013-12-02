<?php
class ClientesTableSeeder extends Seeder {
  public function run()
  {
    DB::table('clientes')->delete();

    $clientes = array(
      array(
        'telefono'  => '6049999',
        'nombre'  => 'Sip Telecomunicaciones LTDA',
        'direccion' => 'Cra 49 Nro 49-76 Oficina 1207' ,
        'notas' => 'Llevar Siempre Caliente' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '2405479',
        'nombre'  => 'Sipelco SAS',
        'direccion' => 'Cra 49 Nro 49-76 Oficina 1207' ,
        'notas' => 'Traer en Menos de 30 Minutos' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
    );

    DB::table('clientes')->insert( $clientes );
  }
}