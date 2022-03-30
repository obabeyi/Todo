<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Todo::latest('DeadLine')->paginate(10);

        return view('backend.mytasks.index', compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::get();
        return view('backend.mytasks.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'tasks' => 'required'
            ],
            [
                'tasks.required' => 'Yapılacak iş tanımı girmeniz gerekmektedir.'
            ]
        );
        $data = $request->all();
        $data['DeadLine'] = date('Y-m-d', strtotime($data['DeadLine']));
        Todo::create($data);

//        return view('backend.mytasks.index');
        return Redirect()->route('mytasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
//        dd($todo);
        $users = User::get();

        return view('backend.mytasks.edit', compact('todo', 'users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
        $todo->update($request->all());
        return redirect()->back();
//        return view('backend.mytasks.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function find(request $request)
    {
        //        dd($request->all());

        $text = $request->get('text');
        $search = Todo::where('tasks', 'LIKE', '%' . $text . '%')->limit(30)->latest()->get();
        $output = '           <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Yapılacak İş</th>

                                    <th>Teslim Tarihi</th>
                                    <th>Açılış Tarihi</th>
                                    <th>Düzenle</th>
                                    <th>Sil</th>
                                </tr>
                                </thead>
                                <tbody>';
        $i = 0;
        foreach ($search as $row) {
            $i++;
            $tasks = $row->tasks;
            $output .= ' <tr id="">
          <td>' . $i . '</td>
           <td class="sortable text-success">' . $tasks . '</td>
               <td>' . $row->DeadLine . '</td>
               <td>' . $row->created_at . '</td>
               <td><a href="' . route('mytasks.edit', $row) . '"><button class="btn btn-info">Düzenle</button></a></td>
               <td><a href="' . route('mytasks.delete', $row) . '"><button class="btn btn-warning">Sil</button></a></td>
                            </div>
                        </div>';
        }
        return $output;
    }

    public function destroy(Todo $todo)
    {
        //
        $todo->delete();
        return Redirect()->back();
    }
}
