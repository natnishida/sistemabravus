<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidades extends Model
{
  protected $table = "modalidades";

  protected $primaryKey = "id_modalidade";

  public function ProspectModalidades() {
  return $this->hasMany('\App\ProspectModalidades', 'id_modalidade', 'id_modalidade');
}
public function Freepass() {
  return $this->hasMany('\App\Freepass', 'id_freepass', 'id_freepass');
}
}
