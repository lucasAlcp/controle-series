<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model{
    //Esta declaração do nome da tabela pode ser omitida pois o laravel utiliza o nome da tabela sendo o nome da classe em minuscula e no plural
    //protected $table = 'series';

    public $timestamps = false;
    protected $fillable = ['nome'];
}
?>