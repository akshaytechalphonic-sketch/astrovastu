<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'page_id',
        'type',
        'title',
        'subtitle',
        'content',
        'image_url',
        'image_position',
        'button_text',
        'button_link',
        'sort_order',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
