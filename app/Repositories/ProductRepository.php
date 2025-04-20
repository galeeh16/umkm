<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

final class ProductRepository implements ProductService
{
    public function getAllWithPaginate(int $page, int $rows_per_page, string $search=''): LengthAwarePaginator
    {
        $products = Product::query()->with(['category']);

        $products = $products->where('user_id', Auth::user()->id);

        $products = $products->when($search, function(Builder $query, $value) {
            return $query->where(DB::raw('lower(product_name)'), 'like', '%'.strtolower($value).'%');
        });

        $products = $products->paginate(
            perPage: $rows_per_page, 
            page: $page
        );

        return $products;
    }

    public function create(array $record): Product
    {
        return Product::create($record);
    }

    public function findByID(string $id): ?Product
    {
        return Product::where('id', $id)->first();
    }
}