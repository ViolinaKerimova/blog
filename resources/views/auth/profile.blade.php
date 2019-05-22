@extends('layouts.app')

@section('content')


<div class='container'>
    <div class='row justify-content-center'>
        <div class='col-lg-12'>
           <h1> {{ __('Edit profile') }} </h1> 
           <div class='card'>
               <div class="card-body">
                   <form method="post" action="{{ route('profile_update')}}">
                       
                       @csrf
                       <div class="form-group">
                           <label class="control-label" for="name"> Name</label>
                           <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" />
                       </div>
                       
                        <div class="form-group">
                           <label class="control-label" for="oldPass"> Old password</label>
                           <input type="password" name="password" id="oldPass" class="form-control" />
                       </div>
                       
                       <div class="form-group">
                           <label class="control-label" for="newPass"> New password</label>
                           <input type="password" name="new_password" id="newPass" class="form-control" />
                       </div>
                       
                       <div class="form-group">
                           <label class="control-label" for="confirmPass"> Confirm password</label>
                           <input type="password" name="new_password_confirmation" id="confirmPass" class="form-control" />
                       </div>
                           
                   
                   <div class="form-group">
                       <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                   </div>
                   </form>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection