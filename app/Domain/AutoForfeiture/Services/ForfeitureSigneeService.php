<?php

namespace App\Domain\AutoForfeiture\Services;

use App\Domain\AutoForfeiture\Repositories\ForfeitureSigneeRepository;

class ForfeitureSigneeService
{
    protected ForfeitureSigneeRepository $repository;

    public function __construct(ForfeitureSigneeRepository $repository)
    {
        $this->repository = $repository;
    }
    public function list()
    {
        return $this->repository->getAll();
    }
    public function create(array $data): int
    {
        return $this->repository->create([
            'usercode'              => $data['usercode'] ?? null,
            'bpar_i_person_id'      => $data['bpar_i_person_id'] ?? null,
            'mp_t_lotforfeiture_id' => $data['mp_t_lotforfeiture_id'],
            'created'               => 'System Auto Forfeited',
            'date_created'          => now()->format('Y-m-d H:i:s'),
            'date_updated'          => null,
            'is_active'             => true,
            'role'                  => 'MKR',
        ]);
    }
    public function createPR(array $data): int
    {
        return $this->repository->create([
            'usercode'              => $data['usercode'] ?? null,
            'bpar_i_person_id'      => $data['bpar_i_person_id'] ?? null,
            'mp_t_lotforfeiture_id' => $data['mp_t_lotforfeiture_id'],
            'created'               => 'System Auto Forfeited',
            'date_created'          => now()->format('Y-m-d H:i:s'),
            'date_updated'          => null,
            'is_active'             => true,
            'role'                  => 'CKR',
        ]);
    }
}
