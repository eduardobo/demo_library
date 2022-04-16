<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

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

    protected $fillable = [
        'name',
        'author',
        'category_id',
        'publication_date',
        'borrowing_user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'borrowing_user_id');
    }
}
