<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <nav class="navbar bg-body-tertiary">
           
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route('registerform')}}">Home Page</a>
              <h4>Student List</h4>
              <div>
                <a href=""><button type="button" class="btn btn-info">Info</button></a>
              <a class="navbar-brand" href="{{ route('StudentForm')}}"><button class="btn btn-primary">Add Student</button></a>
              </div>
            </div>
            
              
          </nav>

          <table class="table pt-4" style="text-align: center;">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Class</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $student)
                    <tr>
                        <th scope="row">{{ $student['id']}}</th>
                        <td scope="col">{{ $student['name']}}</td>
                        <td scope="col">{{ $student['email']}}</td>
                        <td scope="col">{{ $student['class']}}</td>
                        <td scope="col">
                            <a href="{{ route('updateform', ['id'=>$student->id])}}"><button class="btn btn-success">Update</button></a>
                            <a href="{{ route('Delete', ['id'=>$student->id])}}"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>