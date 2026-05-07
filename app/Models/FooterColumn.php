<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class FooterColumn extends Model {
    protected $fillable = ['title','order','is_active'];
    protected $casts = ['is_active'=>'boolean'];
    public function links(): HasMany { return $this->hasMany(FooterLink::class)->where('is_active', true)->orderBy('order'); }
}
