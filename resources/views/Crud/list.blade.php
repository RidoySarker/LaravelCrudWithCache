@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">
               @if(session('success'))
               <div class="alert with-close alert-info alert-dismissible fade show">
                  {{(session('success'))}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
            </div>
            @endif
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-12">
                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal">Add New</button>
                  </div>
               </div>
               <!-- Modal -->
               <div id="modal" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title">Create Post</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <form action="{{ route('crud.store') }}" method="post">
                           <div class="modal-body">
                              @csrf
                              <div class="form-group">
                                 <label >Name</label>
                                 <input type="text" class="form-control" placeholder="Title" name="name" value="{{ old('title') }}">
                                 <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                              </div>
                              <div class="form-group">
                                 <label >Department</label>
                                 <input type="text" class="form-control" placeholder="Title" name="department" value="{{ old('department') }}">
                                 <small class="form-text text-danger">{{ $errors->first('department') }}</small>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($crud_data as $key => $value)
                     <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->department}}</td>
                        <td>
                           <a href="{{route('crud.edit', $value->crud_id)}}" class="btn btn-info btn">Edit</button></a>
                           <form method="post" action="{{route('crud.destroy',$value->crud_id)}}">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                           </form>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection