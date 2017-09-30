<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }


  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    $todos = $this->todo->all();
     return view('todo.index',compact('todos'));
  }

  public function create() //ここでTodoの追加の処理を書く
    {
        return view('todo.create');
    }


  public function store(Request $request) //入力された文字をDBに登録する処理を
    {
        $input =  $request->all();
        $this->todo->fill($input);
        $this->todo->save();

        return redirect()->to('todo');
    }

  public function edit($id) //todoの編集の処理を書く
    {
        $todo = $this->todo->find($id);
        return view('todo.edit')->with(compact('todo'));
    }

  public function update(Request $request, $id) //todoの内容を編集し、更新できるようにする処理を書く
    {
        $input = $request->all();
        $this->todo->where('id', $id)->update(['title' => $input['title']]);

        return redirect()->to('todo');
    }

  public function destroy($id) //削除の記述を書く
    {
        $data = $this->todo->find($id);
        $data->delete();

        return redirect()->to('todo');
    }
}
