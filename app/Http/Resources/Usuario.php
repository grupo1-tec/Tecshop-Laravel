<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Usuario extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->name,
            'fechaNac' => $this->fechaNac,
            'telefono' => $this->telefono,
            'admin' => $this->admin,
            'documento_tipo' => $this->documento_tipo,
            'documento_nro' => $this->documento_nro,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
