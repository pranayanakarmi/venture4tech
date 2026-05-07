<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Project extends Model {
    protected $fillable = ['title','slug','short_description','description','thumbnail','client','year','url','technologies','category','is_featured','is_active','order'];
    protected $casts = ['is_active'=>'boolean','is_featured'=>'boolean','technologies'=>'array'];
    public function scopeActive($query) { return $query->where('is_active', true)->orderBy('order'); }
    public function scopeFeatured($query) { return $query->where('is_featured', true); }
}
