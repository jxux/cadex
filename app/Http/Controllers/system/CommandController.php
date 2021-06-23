<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller{

    public function migrate(){
        Artisan::call('migrate:fresh --seed');
    }

    public function artisanClear(){
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
    }

    public function StorageLink(){
        Artisan::call('storage:link');
    }

    public function pull(){
        $process = new Process('git pull origin main');
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $output = $process->getOutput();
        
        return json_encode($output);
    }
    
}
