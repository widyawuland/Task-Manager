<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize("Melihat Task");
        $Data=Task::latest()->paginate(5);
        return new TaskResource(true,"data task",$Data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("Menyimpan Task");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize("Melihat Task");
        $show= Task::find(id: $id);
        return new TaskResource(true, "data berhasil", $show);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize("Mengubah Task");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize("Menghapus Task");
        $delete= Task::find($id);
        
        $delete->delete();
        return new TaskResource(true, "data dihapus", $delete);
    }
}
// namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
// use App\Http\Resources\TaskResource;
// use Illuminate\Http\Request;
// use App\Models\Task;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


// class TaskController extends Controller
// {
//     use AuthorizesRequests;
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $this->authorize("Melihat Task");

//         $Data=Task::latest()->paginate(5);
//         //return response()->json(["status"=>"berhasil", "data"=>$Data]);
//         return new TaskResource(true, "data task",$Data);
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(string $id)
//     {
//         $this->authorize("Membuat Task");

//         $store= Task::find($id);
//         return new TaskResource(true, "store", $store);
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         $this->authorize("Melihat Task");

//         $show= Task::find($id);
//         return new TaskResource(true,"show",$show);
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(string $id)
//     {
//         $this->authorize("Mengubah Task");

//         $update= Task::find($id);
//         return new TaskResource(true, "berhasil di update", $update);
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         $this->authorize("Menghapus Task");

//         $delete= Task::find($id);
//         $delete ->delete();
//         return new TaskResource(true,"berasil delete",$delete);
//     }
// }
