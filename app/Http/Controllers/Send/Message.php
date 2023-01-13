<?php

namespace App\Http\Controllers\Send;

use App\Http\Controllers\Controller;
use App\Models\MessageHistory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Message extends Controller
{
    public function form()
    {
        return view('Send.form', [
            'title' => 'Pesan Annonymouse'
        ]);
    }

    public function send(Request $request)
    {
        $this->validate(
            $request,
            [
                'message' => 'required'
            ],
            [
                'message.required' => 'Pesan dibutuhkan kakk'
            ]
        );

        $checkIP = MessageHistory::where('ip_address', $request->getClientIp())
            ->whereBetween('created_at', [date('Y-m-d H:i:s', strtotime('-30 minutes', Carbon::now()->timestamp)), date('Y-m-d H:i:s', Carbon::now()->timestamp)])->get();

        if ($checkIP->count() > 0) {
            return redirect()->back()->with('error', 'Kamu hanya bisa mengirim pesan 30 menit sekali kak :)');
        }

        $url = 'https://fastwa.io/api/whatsapp/message/send/' . env('FASTWA_API');

        $text = "========================================\nKamu dapat chat dari IP : " . $request->getClientIp() . "\nPada : " . date('D d-M-Y H:i:s', Carbon::now()->timestamp) . "\n========================================\nPesan : " . $request->message . "\n========================================\nUser Agent : " . $request->userAgent();

        $data = [
            'phone_number' => '6281225389903',
            'text_message' => $text
        ];

        $encodedData = json_encode($data);
        $curl = curl_init($url);
        // $data_string = urlencode(json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept: application/json'));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $encodedData);
        $result = json_decode(curl_exec($curl), true);
        curl_close($curl);

        $query = [
            'ip_address' => $request->getClientIp(),
            'url_ref' => $request->header('referer'),
            'user_agent' => $request->userAgent(),
            'message' => $request->message,
            'fastwa_status' => json_encode($result)
        ];

        if (is_null(MessageHistory::create($query))) {
            return redirect()->back()->with('error', 'Terjadi kesalahan dalam menyimpan pesan');
        }

        if ($result['message'] == 'Message sent successfully') {
            return redirect()->back()->with('success', 'Berhasil mengirim pesan Anda!');
        } else if ($result['message'] == 'Your limit message has been used up') {
            return redirect()->back()->with('error', 'Hari ini cukup yaa, pesanmu belum terkirim ');
        } else if ($result['message'] == 'Instance key not found') {
            return redirect()->back()->with('error', 'Terjadi kesalahan dalam mengirim pesan');
        } else if ($result['message'] == "Error while sending message. Phone isn\\'t connected or phone receiver doesn\\'t regisreted on Whatsapp.") {
            return redirect()->back()->with('error', 'Terjadi kesalahan dalam mengirim pesan');
        } else {
            return redirect()->back()->with('success', 'Berhasil mengirim pesan Anda! HMHM');
        }
    }
}