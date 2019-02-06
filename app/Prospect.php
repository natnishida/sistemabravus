<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
  protected $table = "prospects";

  protected $primaryKey = "id_prospect";

  public function ProspectModalidades() {
    return $this->hasMany('\App\ProspectModalidades', 'id_modalidade', 'id_modalidade');
  }
  public function Freepass() {
    return $this->hasMany('\App\Freepass', 'id_freepass', 'id_freepass');
  }
  public function Acoes() {
    return $this->hasMany('\App\Acoes', 'id_acoes', 'id_acoes');
  }

}
