<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Project extends Model
{
    use HasFactory, Searchable;

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
}
