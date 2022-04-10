<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Book
 * 
 * @property integer $id
 * @property string $name
 * @property string $author
 * @property integer $category_id
 * @property string $publication_date
 * @property integer $borrowing_user_id
 * @property string $create_at
 * @property string $update_at
 */

class Book extends Model
{
    use HasFactory;
}
