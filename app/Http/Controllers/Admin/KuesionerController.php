<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ans_kuesioner;
use App\Models\Kuesioner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
class KuesionerController extends Controller
{

    public function index(Request $request)
    {
        // $kuesioner = Kuesioner::all();
        // return view('admin.kuesioner.index', compact('kuesioner'));
        if(Gate::allows('isAdmin')){
            if(request()->ajax())
        {
            $data = Kuesioner::latest()->get();
            return datatables()->of($data)
                    ->AddIndexColumn()
                    ->addColumn('action', function($data){
                        $edit = '<a href="'.route('kuesioner.edit', $data->id).'" class="btn btn-info btn-sm">Edit</a>';
                        $delete = '<a href="javascript:void(0)" onClick="deleteData('.$data->id.')" class="btn btn-danger btn-sm">Delete</a>
                        <form id="delete-form-'.$data->id.'" action="'.route('kuesioner.destroy', $data->id).'" method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            '.csrf_field().'
                        </form>';
                        return $edit.' '.$delete;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.kuesioner.index');
        } else {
            return redirect('login');
        }
    }

    public function create()
    {
        return view('admin.kuesioner.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
        ]);

        $question = new Kuesioner();
        $question->question = $request->question;
        $question->a = $request->a;
        $question->b = $request->b;
        $question->c = $request->c;
        $question->d = $request->d;
        // $question->answer = $request->answer;
        $question->save();

        return redirect()->route('kuesioner.index')->with('success', 'Question has been added');
    }

    public function edit($id)
    {
        $kuesioner = Kuesioner::find($id);
        return view('admin.kuesioner.edit', compact('kuesioner'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
        ]);

        $question = Kuesioner::findOrFail($id);
        $question->question = $request->question;
        $question->a = $request->a;
        $question->b = $request->b;
        $question->c = $request->c;
        $question->d = $request->d;
        $question->save();
        return redirect()->route('kuesioner.index')->with('success', 'Question has been updated');
    }

    public function destroy($id)
    {
        $question = Kuesioner::findOrFail($id);
        $question->delete();
        return redirect()->route('kuesioner.index')->with('success', 'Question has been deleted');
    }


    public function user()
    {
        Session::put('nextq', '1');
        $question = Kuesioner::all()->first();
        $user = Auth::user()->id;
        return view('user.kuesioner.index', compact('question'));
        // dd($question,$user);
    }

    public function addKuesioner(Request $request)
        {
        $request->validate([
            'user_id' => 'required',
        ],
        [
            'user_id.required' => 'Name is required',
        ]);

        $question = Ans_kuesioner::create([
            'user_id' => Auth::user()->id,
            'kuesioner_id' =>1,
            'value' =>$request->value
        ]);

        dd($question);
        
       
    }


    public function storeData(Request $request)
    {
      
        $nextq = Session::get('nextq');

        $nextq = $nextq + 1;
        $question = new Ans_kuesioner();
        $question->user_id = Auth::user()->id;
        $question->kuesioner_id = $request->kuesioner_id;
        $question->value = $request->value;
        $question->save();
    
        Session::put('nextq', $nextq);
    
        $i=0;
        $questions = Kuesioner::all();
        foreach ($questions as $question) {
          $i++;
          if($question->count() < $nextq){
          return redirect()->route('dashboard');
          }
          if($i == $nextq){
            return view('user.kuesioner.index',compact('question'));
          }
        }
        // return redirect()->route('kuesioner.index')->with('success', 'Question has been added');
    }
}
