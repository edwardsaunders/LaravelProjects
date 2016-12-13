<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GameController extends Controller
{
    public function store(Request $request){
        Game::create(['white'=>$request->input('white'),'black'=>$request->input('black'),'moves'=>'']);
        return redirect('/');
    }
    //

    public function postMove(number $id){
        $game = Game::where('id',$id)->firstOrFail();

        return view('new-game.index')->with(compact('game'));
    }



    public function makeMove(Request $request, Game $game){
        $moves = $game.getMoves();
        if (Auth::id() == $game->white){
            if ($moves->legnth%2==0) {
                $game . makeMove($request->input('move'));
            }
            else{
                return view('errors.moveError.OutOfTurn');
            }
        }
        else if (Auth::id() == $game->black){
            if ($moves->legnth%2==1) {
                $game . makeMove($request->input('move'));
            }
            else{
                return view('errors.moveError.OutOfTurn');
            }
        }
        else {
            return view('errors.moveError.UnassignedGame');
        }

    }

}
