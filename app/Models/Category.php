<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 * 
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $create_at
 * @property string $updated_at
 */

class Category extends Model
{
    use HasFactory;
}
