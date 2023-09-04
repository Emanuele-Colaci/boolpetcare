<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vaccination;
use App\Models\Illness;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'species', 'date_born', 'genre', 'owner', 'notes', 'image'];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function vaccinations() {
        return $this->belongsToMany(Vaccination::class);
    }
    public function illnesses() {
        return $this->belongsToMany(Illness::class);
    }
}
