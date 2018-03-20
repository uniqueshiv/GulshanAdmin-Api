<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Ramsey\Uuid\Uuid;
use DB;
use Auth;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Http\Requests;
use App\Contact;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
  public $successStatus=200;
     public function __construct()
     {

         $this->middleware('auth:admin');
     }


     public function index()
     {

         $notifications = Notification::orderBy('id', 'desc')->get();


         return view('notifications.index', compact('notifications'));
     }

     public function contactapi(Request $request){

         $user = new Contact;
         $user->name = Input::get('name');
         $user->phone = Input::get('phone');
         $user->message = Input::get('message');
         if($user->save()){
              return response()->json(['message'=>'Successfully save!'],200);
         }else{
              return response()->json(['error'=>'Something went wrong!'],402);
         }
     }

     public function create()
     {

         return view('notifications.create');
     }

     public function store(Request $request)
     {





         $data = $request->all();

         $notifications = Notification::create($data);
         Notify()->flash('Notification Successfully Saved.', 'success');
         return response()
             ->json([
                 'created' => true,
                 'notification_id' => $notifications->id
             ]);

     }


     public function show($id)
     {
         $notifications = Notification::findOrFail($id);

         return view('notifications.show', compact('notifications'));
     }

    public function servicesxmlnotifications()
       {
         $notifications = Notification::all();
         dd($notifications);
           return view('notifications.xmlservices', compact('notifications'));

      }
      public function destroynotification($id){
     $notification = Notification::findOrFail($id);
           $notification->delete();


            Notify()->flash('Notification Deleted Successfully.', 'success');
           return response()
             ->json([
                 'deleted' => true

             ]);

      }
      public function edit($id)
     {
         $notification = Notification::findOrFail($id);
         return view('notifications.edit', compact('notification'));
     }

     public function update(Request $request, $id)
     {


         $notification = Notification::findOrFail($id);

         $data = $request->all();
         $notification->update($data);
          Notify()->flash('Notification Updated Successfully.', 'success');
         return response()
             ->json([
                 'updated' => true,
                 'id' => $notification->id
             ]);
     }



          public function sendMessage(Request $request){
    $massagedata =$request->all();
 	$id=$massagedata['id'];
         $title =$massagedata['post_title'];
         $catagory =$massagedata['catagory'];
         $big_image =$massagedata['content_image'];

         // return response()
         //     ->json([
         //         $samplearray

         //     ]);
         //  die();
         $content = array(
             "en" => $title
             );
         $heading = array(
             "en" => $catagory
             );


         $fields = array(
             'app_id' => "2b95a4f8-9b39-4f8c-941b-2031b5929592",
             'included_segments' => array('All'),
             'data' => $massagedata,
             'contents' => $content,
             'headings' => $heading,
             'big_picture'=>$big_image
         );

         $fields = json_encode($fields);
    // print("\nJSON sent:\n");
     //print($fields);

         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                    'Authorization: Basic ODZiNmMxMDYtZmQ2Zi00YTE5LTljMzItYjI5ZmNiOGY2NDQy'));
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
         curl_setopt($ch, CURLOPT_HEADER, FALSE);
       //  curl_setopt($ch, CURLOPT_POST, TRUE);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

         $response = curl_exec($ch);
         curl_close($ch);
         if(!empty($response)){
         	$encodearray= json_decode($response);
 		        if(array_key_exists('errors', $encodearray)){
 		        return ($response);

 		        }
 		        else{
 		       $notification = Notification::findOrFail($id);
 			$notification->status = 'sent';
 			$notification->save();
 		        return "Notification Sent ";
 		        }


         }
         else{

 		        return "Unknown response ";
 	}


        // return $response;

        // return response()
         //     ->json([
         //         $samplearray

         //     ]);
         //  die();
     }
 }
