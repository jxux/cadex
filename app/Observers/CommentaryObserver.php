<?php

namespace App\Observers;

use App\Models\Commentary;

class CommentaryObserver{
    
    public function creating(Commentary $commentary){
        if(! \App::runningInConsole()){
            $commentary->user_id = auth()->user()->id;
        }
    }

}
