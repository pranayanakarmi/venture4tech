<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HomeHeroSection extends Model {
    protected $fillable = ['title','subtitle','is_active'];
    protected $casts = ['is_active'=>'boolean'];
}
