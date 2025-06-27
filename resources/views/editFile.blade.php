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

                <form method="post" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="file" class="form-label">Select File</label>
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror"
                            id="file" accept=".jpg,.png,.webp" required   onchange="document.querySelector('#preview').src=window.URL.createObjectURL(this.files[0])">
                        @error('file')
                        <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                         <img  src="{{asset('storage/'.$user->image)}}"  id="preview" width="100" height="100">
                    </div>



                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
