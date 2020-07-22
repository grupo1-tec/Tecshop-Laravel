<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Servicio extends JsonResource
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
            'nombre' => $this->ser_nombre,
            'descripcion' => $this->ser_descripcion,
            'precio' => $this->ser_precio,
            'categoria_id' => $this->categoria_id,
            'user_id' => $this->user_id,
            'comentarios' => $this->Comentarios,
        ];
    }
}