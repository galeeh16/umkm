<?php declare(strict_types=1);

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryService 
{
    public function findAll(): Collection;

    public function findByID(string $id): Category;
}