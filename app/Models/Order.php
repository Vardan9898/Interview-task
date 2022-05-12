<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kyslik\ColumnSortable\Sortable;

/**
 * @property int $id
 * @property int $client_id
 * @property int $product_id
 * @property Carbon $date
 * @property int $total
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Order extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = ['client', 'product', 'total', 'date'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    protected $with = ['client', 'product'];

    /**
     * @param $query
     * @param  array  $filters
     * @return void
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) => $query->where(fn ($query) => $query->where('total', $search)
                ->orWhere('date', 'like', '%' . $search . '%')
                ->orWhereRelation('product', 'name', 'like', '%' . $search . '%')
                ->orWhereRelation('client', 'name', 'like', '%' . $search . '%')
            )
        );
        if (isset($filters['search'])) {
            $query->when(
                (isset($filters['filters']) && $filters['filters'] == 'client') ?? false,
                fn ($query, $search) => $query->whereRelation('client', 'name', 'like', '%' . $filters['search'] . '%')
            );

            $query->when(
                (isset($filters['filters']) && $filters['filters'] == 'product') ?? false,
                fn ($query, $search) => $query->whereRelation('product', 'name', 'like', '%' . $filters['search'] . '%')
            );

            $query->when(
                (isset($filters['filters']) && $filters['filters'] == 'total') ?? false,
                fn ($query, $search) => $query->where('total', $filters['search'])
            );

            $query->when(
                (isset($filters['filters']) && $filters['filters'] == 'date') ?? false,
                fn ($query, $search) => $query->where('date', 'like', '%' . $filters['search'] . '%')
            );
        }

    }

    /**
     * @return BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
