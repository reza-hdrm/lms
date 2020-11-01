<?php

namespace Reza_hdrm\RolePermissions\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepo
{
    public function all() {
        return Role::all();
    }

    public function findById(int $id) {
        return Role::findOrFail($id);
    }

    public function create($request) {
        Role::create(['name' => $request->name])->syncPermissions($request->permissions);
        return back();
    }

    public function update(int $id, $request) {
        $role = $this->findOrFail($id);
        return $role->syncPermissions($request->permissions)->update(['name' => $request->name]);
    }

    public function delete(int $id) {
        return Role::where('id', $id)->delete();
    }
}