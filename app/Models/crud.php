<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    /**
 * @OA\Schema(
 *     schema="Crud",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="nom", type="string"),
 *     @OA\Property(property="prenom", type="string"),
 *     @OA\Property(property="contact", type="string")
 * )
 */
    protected $table = "crud";
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'contact',
    ];
}
