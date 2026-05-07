<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class MenuItem extends Model {
    protected $fillable = ['menu_id','parent_id','label','url','route_name','order','is_active','open_in_new_tab'];
    protected $casts = ['is_active'=>'boolean','open_in_new_tab'=>'boolean'];
    public function menu(): BelongsTo { return $this->belongsTo(Menu::class); }
    public function parent(): BelongsTo { return $this->belongsTo(MenuItem::class, 'parent_id'); }
    public function children(): HasMany { return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('order'); }
}
