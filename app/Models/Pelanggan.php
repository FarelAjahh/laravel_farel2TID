<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'pelanggan_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
    ];

    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            $value = $request->input($column);
            if ($request->filled($column) && in_array($value, ['Male', 'Female', 'Other'], true)) {
                $query->where($column, $value);
            }
        }

        return $query;
    }

    public function scopeSearch(Builder $query, $request, array $columns): Builder
    {
        $search = trim((string) $request->input('search', ''));

        if ($search !== '') {
            $query->where(function (Builder $searchQuery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $searchQuery->orWhere($column, 'LIKE', '%' . $search . '%');
                }
            });
        }

        return $query;
    }
}
