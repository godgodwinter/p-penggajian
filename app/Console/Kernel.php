<?php

namespace App\Console;

use App\Helpers\Fungsi;
use App\Http\Controllers\smscontroller;
use App\Models\penjadwalan;
use App\Models\settings;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

    //     if((Fungsi::reminderotomatis())=='Aktif'){
    //     // $schedule->command('inspire')->hourly();
    //     $schedule->call(function () {
    //         // DB::table('recent_users')->delete();

    //         $pesan='Pesan';
    //         function kirimsms($to,$msg){
    //             //init SMS gateway, look at android SMS gateway
    //             $idmesin = Fungsi::reminderidmesin();
    //             $pin = Fungsi::reminderpin();

    //             // create curl resource
    //             $ch = curl_init();

    //             // set url
    //             curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$idmesin&pin=$pin&to=$to&text=$msg");

    //             //return the transfer as a string
    //             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //             // $output contains the output string
    //             $output = curl_exec($ch);

    //             // close curl resource to free up system resources
    //             curl_close($ch);
    //             return($output);
    //             }
    //             $nomer=0;
    //             // periksa jadwal perawatan //table penjadwalan where tgl
    //             $ambildatapenjadwalan=penjadwalan::with('perawatan')->get();
    //             foreach($ambildatapenjadwalan as $data){
    //                 $tgl=$data->tgl;
    //                 $hasil= date('Y-m-d', strtotime('-'.Fungsi::reminderhari().' days', strtotime($tgl)));

    //                 if($hasil==date('Y-m-d')){
    //                         $telp=str_replace(' ', '', $data->perawatan->member->telp);
    //                     $pesan="Yth. Sdr/Sdri ".$data->perawatan->member->nama.", Kami dari Klinik Perawatan Ramdhani Skincare memberitahu bahwa besok ".$tgl." ada jadwal perawatan di Klinik Kami. Terimakasih.";
    //                     // dd('kirim pesan',$telp,$pesan);
    //                     $sending=kirimsms($telp,$pesan);

    //                     $nomer++;
    //                     // dd('kirim pesan',$data->perawatan->member->telp);

    //                 }

    //             }


    //     })
    //     ->timezone('Asia/Jakarta')
    //     ->dailyAt(Fungsi::reminderjam());
    // }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
