<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HomeContactCtaSection extends Model {
    protected $fillable = ['label','title','description','cta_text','cta_url','is_active'];
    protected $casts = ['is_active'=>'boolean'];
}
