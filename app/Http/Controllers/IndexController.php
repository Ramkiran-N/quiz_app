<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function question($category,$no,$ans)
    {
        try {
            if($no==1){
                session()->forget('quiz_questions');
                $categoryEs = str_replace(' ',"_",$category);
                $categoryEs = str_replace('&',"and",$category);
                $res = Http::get('https://the-trivia-api.com/api/questions?categories='.$categoryEs.'&limit=15')->json();
                if($res){
                    foreach($res as $key=>$item){
                        $choices = $item['incorrectAnswers'];
                        $choices[] = $item['correctAnswer'];
                        session()->push(
                            'quiz_questions',
                             [
                                'id'=>$key+1,
                                'category'=>$category,
                                'question'=>$item['question'],
                                'choices'=>$choices,
                                'correctAnswer'=>$item['correctAnswer'],
                                'userAnswer'=>null
    
                             ],
                        );
                    }
                }
                
            }else{
                if($ans != 0){
                    $sessionData = session()->get('quiz_questions');
                    $index = $no-2;
                    $ansIndex = $ans-1;
                    $sessionData[$index]['userAnswer'] = $sessionData[$index]['choices'][$ansIndex];
                    session()->put('quiz_questions', $sessionData);
                }
            }
           if($no>15){
            return redirect()->route('result');
           }
            $question = session()->get('quiz_questions');
            return view('question',['data'=>$question[$no-1]]);
        } catch (\Throwable $th) {
            dd($th);
        }
      
    }
    public function result()
    {
        $result = session()->get('quiz_questions');
        $rightAnswer=0;
        foreach($result as $item){
            if($item['correctAnswer'] == $item['userAnswer']){
                $rightAnswer++;
            }
        }
        $percentage = $rightAnswer/15 * 100;
        if($percentage>60){
            $text = 'Winner';
        } elseif ($percentage >= 40) {
            $text = 'Better';
        }else{
            $text='Failed';
        }
        return view('result',['data'=>session()->get('quiz_questions'),'text'=>$text]);
    }
    public function reset()
    {
        session()->forget('quiz_questions');
        return redirect()->route('index');
    }
}
