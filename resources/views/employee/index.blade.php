<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', 'Arial', sans-serif;
            padding-bottom: 50px;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        .remove_link_colour {
            a, a:hover, a:focus, a:active {
                color: inherit;
                text-decoration: none;
            }
        }
    </style>
</head>
<body>
    <div style="width: 95%; margin-left: auto; margin-right: auto; margin-top: 20px;">
        <h1>Employee Management Panel</h1>
        <button class="remove_link_colour btn btn-primary mb-4 mt-2"><a href="{{ route('employee.create') }}">Add Employee</a></button>

        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Aksi</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr style="border-bottom-color: #dee2e6">
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->nama }}</td>
                    <td>{{ $employee->umur }}</td>
                    <td>{{ $employee->alamat }}</td>
                    <td>{{ $employee->no_telp }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('employee.edit', $employee->slug) }}" class="btn" style="background-color: #E7A91D; border-color:#E7A91D">
                            <i class="fas fa-pencil-alt" style="color: white;"></i>
                            {{-- <span style="margin-left:5px; color:white;">Edit</span> --}}
                        </a>
                        <!-- Delete Button -->
                        <form action="{{ route('employee.delete', $employee->slug) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >
                                <i class="fas fa-trash" style="color: white;"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        <div class="d-flex justify-content-end">
            {{ $employees->links() }}
        </div>
        
    </div>
    
    
    

    
    
    
</body>
</html>
