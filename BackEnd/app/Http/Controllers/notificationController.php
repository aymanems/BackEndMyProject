<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;


class notificationController extends Controller
{
    public function index()
    {
        $notifications=Notification::orderBy('created_at', 'desc')->get();
        return $notifications;
    }

    public function markAsRead(Notification $notification)
    {
        $notification->update(['read' => true]);
        return response()->json(['message'=>'updated successfully']);
    }
    public function store(Request $request,$id)
    {
        $notification=new Notification();
        $notification->title=$request->title;
        $notification->content=$request->content;
        $notification->read=0;
        $notification->student_id=$id;
        $notification->save();
       
        return response()->json(['message'=>'Enregistré avec succès']);
    }
}
