<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HomeStatsSection extends Model {
    protected $fillable = ['label','title','description','is_active'];
    protected $casts = ['is_active'=>'boolean'];
}
