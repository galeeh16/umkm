<?php declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductService 
{
    public function getAllWithPaginate(int $page, int $rows_per_page, string $search=''): LengthAwarePaginator;

    public function create(array $record): Product;

    public function findByID(string $id): ?Product;
}