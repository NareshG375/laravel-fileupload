<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>File Upload</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   </head>
   <body>
      <div class="container">
         <!-- Form Section -->
         <div class="row justify-content-start">
            <div class="col-md-6">
               @if (session('status'))
               <div class="alert alert-success">{{ session('status') }}</div>
               @endif
               
            </div>
         </div>
         <!-- User Images Section -->
         <div class="row justify-content-start">

            <h1>User Listing Page</h1>
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Date</th>
                     <th scope="col">Image</th>
                     <th scope="col">Name</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @forelse ($users as  $key=>$user)
                  <tr>
                     <th scope="row">{{$key+1}}</th>
                     <td>{{$user->created_at}}</td>
                     <td> <img src="{{ asset('storage/' . $user->image) }}" class="img-fluid img-thumbnail" alt="User Image"
                        width="100" height="100"></td>
                     <td>{{$user->name}}</td>
                     <td>
                        <a type="button"  href="{{route('users.edit',$user->id)}}" class="btn btn-success">Edit</a>
                        <form action="{{route('users.destroy',$user->id)}}" method="post"  onsubmit="return confirm('Are you sure you want to delete this user?')">
                           @csrf
                           @method("DELETE")
                           <button type="submit" class="btn btn-danger mb-1">Delete</button>
                        </form>
                     </td>
                  </tr>

                  @empty

                    <tr>
                    <td colspan="5" class="text-center">
                
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Add New Record</a>
                    </td>
                    </tr>
                  @endforelse
               </tbody>
            </table>
         </div>
      </div>
   </body>
</html>