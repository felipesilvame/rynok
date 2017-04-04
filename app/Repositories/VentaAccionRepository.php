<?php

namespace App\Repositories;

use App\Models\VentaAccion;
use InfyOm\Generator\Common\BaseRepository;

class VentaAccionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return VentaAccion::class;
    }
}
