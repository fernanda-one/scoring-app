<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('presence.juri.{id}', function ($user , $id){
    return $user;
});

Broadcast::channel('presence.dewan.{id}', function ($user , $id){
    return $user;
});
Broadcast::channel('presence.operator.{id}', function ($user , $id){
    return $user;
});
Broadcast::channel('presence.ketuapertandingan.{id}', function ($user , $id){
    return $user;
});
Broadcast::channel('presence.updateScore.{id}', function ($user , $id){
    return $user;
});
Broadcast::channel('presence.ketuaPertandingan.{id}', function ($user , $id){
    return $user;
});
Broadcast::channel('presence.dropVerification.{id}', function ($user , $id){
    return $user;
});
Broadcast::channel('presence.penalty.{id}', function ($user , $id){
    return $user;
});
