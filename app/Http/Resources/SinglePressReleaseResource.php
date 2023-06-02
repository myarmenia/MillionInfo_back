<?php

namespace App\Http\Resources;

use App\Models\VideoLink;
use Illuminate\Http\Resources\Json\JsonResource;

class SinglePressReleaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return $data =  [
            'id' => $this->id,
            'title' => $this->translation($request->lng_id)->title,
            'description' => $this->translation($request->lng_id)->description,
            'date' => $this->date,
            'time' => $this->time,
            'logo' => route('get-file',['path'=>$this->logo]),
            "files" => FileResource::collection($this->files),
            "links" => LinkResource::collection($this->links),
            'videos' => VideoLinkResource::collection($this->get_file())
        ];
    }

    public function get_file()
    {
        return VideoLink::all();
    }

}
