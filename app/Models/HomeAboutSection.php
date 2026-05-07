<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HomeAboutSection extends Model {
    protected $fillable = ['label','title','description','image','cta_text','cta_url','is_active'];
    protected $casts = ['is_active'=>'boolean'];
}
