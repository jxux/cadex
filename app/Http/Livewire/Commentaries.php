<?php

namespace App\Http\Livewire;

use App\Models\Commentary;
use App\Models\Post;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;

class Commentaries extends Component{

    use WithPagination;

    public $post_id, $valoration = 5, $body;

    // public $user_id = 1;

    public function render(){

        $users = User::select('id','name','profile_photo_path')->get();
        
        $commentaries = Commentary::join('users', 'users.id', '=', 'commentaries.user_id')
                                    ->select('commentaries.*', 'name', 'profile_photo_path')
                                    ->where('post_id', $this->post_id)
                                    ->latest('id')
                                    ->paginate(5);

        return view('livewire.commentaries', compact('commentaries', 'users'));
    }

    public function store(){
        $this->validate(['valoration' => 'required|numeric', 'body' => ['required', 'max:2000']]);
        Commentary::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post_id,
            'valoration' => $this->valoration,
            'body' => $this->body
        ]);
        
        $this->default();
    }

    public function destroy($id){
        Commentary::destroy($id);
    }

    public function default(){
        $this->valoration = '5';
        $this->body = '';
    }

}
