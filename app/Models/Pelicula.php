<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelicula
 *
 * @property $id
 * @property $nombre
 * @property $duracion
 * @property $generoId
 * @property $created_at
 * @property $updated_at
 *
 * @property Genero $genero
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pelicula extends Model
{

  static $rules = [
    'nombre' => 'required|string',
    'duracion' => 'required|int',
    'generoId' => 'required|int',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['nombre', 'duracion', 'generoId'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function genero()
  {
    return $this->hasOne('App\Models\Genero', 'id', 'generoId');
  }
 

}