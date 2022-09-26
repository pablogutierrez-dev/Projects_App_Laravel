<?php

namespace App\Models;

use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, Searchable, SoftDeletes;

    /* protected $fillable = ['title', 'url', 'description']; */
    protected $guarded = [];

    public function getRouteKeyName() {
      return 'url';
    }

    public function toSearchableArray()
    {
        return [
          'title' => $this->title,
          'description' => $this->description,
        ];
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
