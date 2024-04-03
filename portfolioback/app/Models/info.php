<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class info extends Model
{
    use HasFactory; 
    use HasFactory ;
    protected $connexion = "mongodb";
    protected $collection = "info";

    protected $fillable = ['prenom', 'nom', 'email', 'tele', 'adresse', 'ville', 'codepostal', 'pay', 'objct'];

}
