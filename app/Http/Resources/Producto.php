<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Producto extends JsonResource
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
            'nombre' => $this->prod_nombre,
            'stock' => $this->prod_stock,
            'precio' => $this->prod_precio,
            'activo' => $this->prod_activo,
            'categoria_id' => $this->categoria_id,
            'comentarios' => $this->Comentarios,
            'user_id' => $this->user_id,
        ];
    }
}
