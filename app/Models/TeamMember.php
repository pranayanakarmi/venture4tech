<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TeamMember extends Model {
    protected $fillable = ['name','position','department','bio','avatar','email','linkedin','twitter','order','is_active'];
    protected $casts = ['is_active'=>'boolean'];
    public function scopeActive($query) { return $query->where('is_active', true)->orderBy('order'); }
}
