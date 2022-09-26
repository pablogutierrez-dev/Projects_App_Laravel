<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function getRouteKeyName() {
        return 'url';
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }
}
