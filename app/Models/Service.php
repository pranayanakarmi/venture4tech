<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Service extends Model {
    protected $fillable = ['title','slug','short_description','description','icon','image','order','is_active','is_featured'];
    protected $casts = ['is_active'=>'boolean','is_featured'=>'boolean'];
    public function scopeActive($query) { return $query->where('is_active', true)->orderBy('order'); }
    public function scopeFeatured($query) { return $query->where('is_featured', true); }
}
