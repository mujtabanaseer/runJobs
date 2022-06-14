<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sending:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::all();
        $data = [
            'name'=>'mujtaba',
            'subject'=>'Test verification',
            'description'=>"Thank You for visit our website",
        ];
        foreach ($user as $num){
            Mail::send('email',$data,function ($message) use($num){
                $message->to($num->email);
                $message->subject("Test verification");
                $message->from("mujtabanaseer.te@gmail.com");
            });

        }
    }
}
