<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @property int $id
 * @property string $title
 * @property string $description
 */

class Product extends Model
{
    use HasFactory;
}
