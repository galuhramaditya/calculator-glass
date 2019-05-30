<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = "material";
    protected $fillable = ["name", "valor_per_ton"];
    public $timestamps = false;
}
