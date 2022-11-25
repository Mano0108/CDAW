<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Energy extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'energy';

    public function Serialize()
    {
        return 
        [
            'energy_id'   => $this->energy_id,
            'name' => $this->name,
            'path' => $this->path,
            'icon' => $this->icon
        ];
    }
}
