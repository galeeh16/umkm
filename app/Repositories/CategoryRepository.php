<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Database\Eloquent\Collection;

final class CategoryRepository implements CategoryService
{
    public function findAll(): Collection
    {
        return Category::query()->get();
    }

    public function findByID(string $id): Category
    {
        return Category::query()->where('id', $id)->first();
    }
}