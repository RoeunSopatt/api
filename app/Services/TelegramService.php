<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    public static function sendMessage($msg,$chanel_id)
    {
        $bot_token  = env('TELEGRAM_BOT_TOKEN');
        $chat_id    = $chanel_id;
        try {
            return Http::withOptions(['verify' => false])->get("https://api.telegram.org/$bot_token/sendMessage?chat_id=$chat_id&text=$msg&parse_mode=html");
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function sendPhoto(Request $req){

        // Check Validation
        $req->validate([
            'photo' => 'required|file|max:51200', //50MB
        ]);



        if ($req->hasFile('photo')) {

            // ===>> Get Credentail from ENV Variable
            $botToken  = env('TELEGRAM_BOT_TOKEN');
            $chatID    = env('TELEGRAM_CHAT_ID');
            $photo = $req->file('photo');

           

            // ===>> Send Request to Telegram
            $res = Http::attach(
                'photo',
                file_get_contents($photo->getRealPath()),
                $photo->getClientOriginalName()
            )->post("https://api.telegram.org/$botToken/sendPhoto", [
                'chat_id' => $chatID,
            ]);

            // ===>> Success Response Back to Client
            return response()->json($res, Response::HTTP_OK);

        }else{
            return $req;
        }
    }
}
