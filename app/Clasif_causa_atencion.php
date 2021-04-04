<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasif_causa_atencion extends Model
{
    protected $table = 'clasif_causa_atencion';
    protected $primaryKey= 'id_clasif_causa_atencion';
    public $timestamps= false;

    static public function consulta_clasif_atencion($id_causa_atencion)
    {
    	return Clasif_causa_atencion::where('id_causa_atencion', $id_causa_atencion)->get();
    }
}
