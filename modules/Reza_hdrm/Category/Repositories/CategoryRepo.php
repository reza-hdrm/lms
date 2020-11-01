<?php

namespace Reza_hdrm\Category\Repositories;

use Reza_hdrm\Category\Models\Category;

class CategoryRepo
{
    public function all() {
        return Category::all();
    }

    public function allExceptById($id) {
        return $this->all()->filter(function ($item) use ($id) {
            return $item->id != $id;
        });
    }

    public function findById(int $id) {
        return Category::find($id);
    }

    public function store($request) {
        return Category::create(
            $this->getCategoryAttribute($request)
        );
    }

    public function update(int $id, $request) {
        Category::where('id', $id)->update(
            $this->getCategoryAttribute($request)
        );
    }

    public function delete(int $id) {
        Category::where('id', $id)->delete();
    }

    private function getCategoryAttribute($value): array {
        return [
            'title' => $value->title,
            'slug' => $value->slug,
            'parent_id' => $value->parent_id,
        ];
    }
}
