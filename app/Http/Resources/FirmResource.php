<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FirmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $categories = array();
        $phones = [];

        foreach($this->categories as $category){
            $categories[$category->title]= $category->id;
        }

        foreach($this->phones as $phone){
            $phones[$phone->phone_num] =$phone->id;
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'building' => $this->building_id,
            'categories' => json_encode($categories),
            'phones' => json_encode($phones)
        ];
    }
}
