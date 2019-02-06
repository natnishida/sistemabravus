<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freepass extends Model
{
  protected $table = "freepass";

  protected $primaryKey = "id_freepass";

  public function Acoes() {
    return $this->hasMany('\App\Acoes', 'id_acoes', 'id_acoes');
  }
}
