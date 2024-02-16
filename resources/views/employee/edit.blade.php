<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/employee_create.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <form action="{{ route('employee.update', $employee->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <h1>Edit {{ $employee->nama }}</h1>

            <div class="input-box">
                <input type="text" name="nama" placeholder="Nama" value="{{ $employee->nama }}">
                @error('nama')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="input-box">
                <input type="number" name="umur" placeholder="Umur" value="{{ $employee->umur }}">
                @error('umur')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-box">
                <input type="text" name="alamat" placeholder="Alamat" value="{{ $employee->alamat }}">
                @error('alamat')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-box">
                <input type="tel" name="no_telp" placeholder="Nomor Telepon" value="{{ $employee->no_telp }}">
                @error('no_telp')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
    
</body>
</html>