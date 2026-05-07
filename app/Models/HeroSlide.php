<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HeroSlide extends Model {
    protected $fillable = ['title','subtitle','description','image','cta_text','cta_url','secondary_cta_text','secondary_cta_url','order','is_active'];
    protected $casts = ['is_active'=>'boolean'];
    public function scopeActive($query) { return $query->where('is_active', true)->orderBy('order'); }
}
