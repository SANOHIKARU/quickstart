@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        🍀 タスクの追加！🍀
      </div>
      <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
          {{ csrf_field() }}
          <!-- Task Name -->
          <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Task</label>
            <div class="col-sm-6">
              <input type="text" name="name" id="task-name" class="form-control">
            </div>
          </div>
          <!-- Add Task Button -->
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-default">
                <i class="fa fa-btn fa-plus"></i>Add Task
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- TODO: Current Tasks -->
    @if (count($tasks) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        🍀 現在のタスク 🍀
      </div>

      <div class="pnel-body">
        <table class="table table-striped task-table">

          <!-- テーブルヘッダ -->
          <thead>
            <th>Task</th>
            <th>&nbsp;</th>
          </thead>

          <!-- テーブル本体 -->
          <tbody>
            @foreach ($tasks as $task)
            <tr>
              <!-- タスク名 -->
              <td class="table-text">
                <div>{{ $task->name }}</div>
              </td>
              <!-- Delete Button -->
              <td>
                <form action="{{ url('task/'.$task->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}   
                  <!--  ↑↑↑
                  複数の url('tasks/'.$task->id) POST を実装する必要が出てきた場合に、method_field()で対応することができる！削除だけじゃなくて編集機能だったり評価機能とかとか。 
                  -->

                  <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Delete
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>

        </table>

      </div>
    </div>
    @endif
  </div>
</div>
@endsection