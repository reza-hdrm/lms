<?php

namespace Reza_hdrm\Category\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function getParentAttribute() {
        return (is_null($this->parent_id)) ? 'ندارند' : $this->parentCategory->title;
    }

    public function parentCategory() {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    public function subCategories() {
        $this->hasMany(__CLASS__, 'parent_id');
    }
}
