<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  protected $fillable = [
      'post_title',
      'content_image', 'catagory', 'html_content', 'created_at' ,'notification_title', 'notification_content', 'notification_image','schedule_date'
  ];
}
