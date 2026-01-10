<?php

namespace App\Domain\AutoForfeiture\Repositories;

use App\Domain\AutoForfeiture\Models\ForfeitureSignee;
use Illuminate\Support\Facades\DB;

class ForfeitureSigneeRepository
{
    public function getAll()
    {
        return ForfeitureSignee::where('is_active', true)->get();
    }

    public function find(int $id): ?ForfeitureSignee
    {
        return ForfeitureSignee::where('mp_t_lotforfeiture_line_id', $id)->first();
    }
    public function create(array $data): int
    {
        return DB::connection('mysql_secondary')
            ->table('mp_t_lotforfeiture_signee')
            ->insertGetId([
                'usercode'               => $data['usercode'] ?? null,
                'bpar_i_person_id'       => $data['bpar_i_person_id'] ?? null,
                'mp_t_lotforfeiture_id'  => $data['mp_t_lotforfeiture_id'],
                'created'                => $data['created'] ?? 'System Auto Forfeited',
                'date_created'           => now()->format('Y-m-d H:i:s'),
                'updated'                => $data['updated'] ?? null,
                'date_updated'           => $data['date_updated'] ?? null,
                'is_active'              => $data['is_active'] ?? true,
                'role'                   => $data['role'] ?? null,
            ]);
    }
}
