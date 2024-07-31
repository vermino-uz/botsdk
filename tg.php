<?php 
define("API_KEY", "$api_key");
function bot($method, $datas = []){
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$callback = $update->callback_query;


$chat_id = $message->chat->id;
$Tc = $message->chat->type;

$text = $message->text;
$mid = $message->message_id;

$from_id = $message->from->id;
$name = $message->from->first_name;
$last = $message->from->last_name;


$video = $message->video;
$file_id = $video->file_id;
$file_name = $video->file_name;
$file_size = $video->file_size;
$size = $file_size / 1000;
$dtype = $video->mime_type;

$audio = $message->audio->file_id;
$photo = $message->photo;
$video = $message->video;
$voice = $message->voice->file_id;
$sticker = $message->sticker->file_id;
$video_note = $message->video_note->file_id;
$animation = $message->animation->file_id;

$caption = $message->caption;


if (isset($callback)) {
    $data = $callback->data;
    $qid = $callback->id;

    $chat_id = $callback->message->chat->id;
    $type_chat = $callback->message->chat->type;
    $mid = $callback->message->message_id;

    $from_id = $callback->from->id;
    $name = $callback->from->first_name;
    $last = $callback->from->last_name;
}

function replyKeyboard($key)
{
    return json_encode(["keyboard" => $key, "resize_keyboard" => true]);
}
function inlineKeyboard($key)
{
    return json_encode(["inline_keyboard" => $key]);
}


