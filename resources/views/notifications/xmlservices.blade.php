<xml version="1.0" encoding="utf-8"> 
<content>
   @​foreach($notifications as $notification)
     <Notification>
        <id>{{ $notification->id }}</id>
        <post_title>{{ $notification->post_title }}</post_title>
        <notification_title>{{ $notification->notification_title }}</notification_title>
        <lastmod>{{ $notification->created_at }}</lastmod>
    </Notification>
   @​endforeach
     </content>
</xml>
