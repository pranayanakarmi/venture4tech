<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Technology extends Model {
    protected $fillable = ['name','logo','category','order','is_active'];
    protected $casts = ['is_active'=>'boolean'];
    public function scopeActive($query) { return $query->where('is_active', true)->orderBy('order'); }
}
