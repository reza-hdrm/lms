<?php

namespace Reza_hdrm\RolePermissions\Http\Controllers;

use Reza_hdrm\Category\Responses\AjaxResponses;
use Reza_hdrm\RolePermissions\Http\Requests\RoleRequest;
use Reza_hdrm\RolePermissions\Http\Requests\RoleUpdateRequest;
use Reza_hdrm\RolePermissions\Repositories\PermissionRepo;
use Reza_hdrm\RolePermissions\Repositories\RoleRepo;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionsController
{
    private $roleRepo;
    private $permissionRepo;

    public function __construct(RoleRepo $roleRepo, PermissionRepo $permissionRepo) {
        $this->roleRepo = $roleRepo;
        $this->permissionRepo = $permissionRepo;
    }

    public function index() {
        $roles = $this->roleRepo->all();
        $permissions = $this->permissionRepo->all();
        return view('RolePermissions::index', compact('roles', 'permissions'));
    }

    public function store(RoleRequest $request) {
        return $this->roleRepo->create($request);
    }

    public function edit(int $roleId) {
        $role = $this->roleRepo->findById($roleId);
        $permissions = $this->permissionRepo->all();
        return view("RolePermissions::edit", compact('role', 'permissions'));
    }

    public function update(RoleUpdateRequest $request, int $id) {
        $this->roleRepo->update($id, $request);
        return redirect(route('role-permissions.index'));
    }

    public function destroy(int $roleId) {
        $this->roleRepo->delete($roleId);
        return AjaxResponses::SuccessResponse();
    }
}
