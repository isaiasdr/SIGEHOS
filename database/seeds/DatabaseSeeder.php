<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Tipo_usuarioTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(ProfesionTableSeeder::class);
        $this->call(OcupacionTableSeeder::class);
        $this->call(NacionalidadTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(DistritoTableSeeder::class);
        $this->call(ZonaTableSeeder::class);
        $this->call(EstatusTableSeeder::class);
        $this->call(ParentescoTableSeeder::class);
        $this->call(Edo_civilTableSeeder::class);
        $this->call(CiudadTableSeeder::class);
        $this->call(DepartamentoTableSeeder::class);
        $this->call(Tipo_servicioTableSeeder::class);
        $this->call(ServicioTableSeeder::class);
        $this->call(TipohabitacionTableSeeder::class);
        $this->call(TipocamaTableSeeder::class);
        $this->call(HabitacionesTableSeeder::class);
        $this->call(MotivoMantCamaTableSeeder::class);
        $this->call(CamasTableSeeder::class);
        $this->call(Causa_atencionTableSeeder::class);
        $this->call(Clasif_causa_atencionTableSeeder::class);
        $this->call(Cargo_medicoTableSeeder::class);
        $this->call(SubespecialidadTableSeeder::class);
        $this->call(MedicoTableSeeder::class);
        $this->call(DiagnosticosTableSeeder::class);
        $this->call(Evento_sistemaTableSeeder::class);
        $this->call(Causa_egresoTableSeeder::class);
        $this->call(Motivo_permisoTableSeeder::class);
        $this->call(ReferenciaTableSeeder::class);
        $this->call(Estatus_pacienteTableSeeder::class);
        $this->call(Tipo_trasladoSeeder::class);
    }
}
