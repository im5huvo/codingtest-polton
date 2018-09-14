@extends('layouts.app')
@section('content')
  <div class="container">
 @if (session('successMsg'))
    <div class="alert alert-dismissible alert-success">
      <button type="button" class= "close" data-dismiss="alert">×</button>
      <strong>Well done!</strong> {{ session('successMsg') }}
     </div>
     @endif
  </div>

  <table id="dt" class="table table-bordered table-striped table-hover ">
    <thead>
    <tr>
      <th>Id</th>
      <th>Roll</th>
      <th>Average</th>
     
      <th>Action</th>
    </tr>
    </thead>
    <tbody>

      @foreach ($students as $student)
  <tr>
        <td>{{ $student->id }} </td>
        <td>{{ $student->roll }} </td>
        <td>{{ $student->average}} </td>
       
        <td><a href="{{route('edit',$student->id)  }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> ||
<form method="POST" id="delete-form-{{ $student->id  }}" action= "{{ route('delete',$student->id) }}"
  style="display: none;" >
  {{csrf_field() }}
  {{ method_field('delete')}}
</form>
      <button onclick="if(confirm('Are you sure , you went to delete this ? ')){
          event.preventDefault();
          document.getElementById('delete-form-{{$student->id }}').submit();
      }else {
        event.preventDefault();
      }" class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>   </button>

         </td>
    </tr>
      @endforeach


    </tbody>
  </table>
  <script>
            $(document).ready(function() {

              $('#dt').DataTable();
          } );
           </script>
</div>

@endsection
