<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HomeTechnologiesSection extends Model {
    protected $fillable = ['label','title','description','is_active'];
    protected $casts = ['is_active'=>'boolean'];
}
