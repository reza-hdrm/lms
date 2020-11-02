<?php

namespace Reza_hdrm\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Reza_hdrm\Category\Http\Requests\CategoryRequest;
use Reza_hdrm\Category\Repositories\CategoryRepository;
use Reza_hdrm\Category\Responses\AjaxResponses;

class CategoryController extends Controller
{
    public $repo;

    public function __construct(CategoryRepository $categoryRepo) {
        $this->repo = $categoryRepo;
    }

    public function index() {
        $categories = $this->repo->all();
        return view('Categories::index', compact('categories'));
    }

    public function store(CategoryRequest $request) {
        $this->repo->store($request);
        return back();
    }

    public function edit(int $categoryId) {
        $category = $this->repo->findById($categoryId);
        $categories = $this->repo->allExceptById($categoryId);
        return view('Categories::edit', compact('category', 'categories'));
    }

    public function update(int $categoryId, CategoryRequest $request) {
        $this->repo->update($categoryId, $request);
        return redirect(route('categories.index'));
    }

    public function destroy(int $categoryId) {
        $this->repo->delete($categoryId);
        return AjaxResponses::SuccessResponse();
    }
}
