<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <!-- Favicons -->
  <link href="/img/icon-sc.png" rel="icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="/admin-template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin-template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('admin.admin-navbar')

  @include('admin.admin-sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <div class="d-flex justify-content-between align-items-center w-100">
                <h3 class="card-title mb-0">Daftar User</h3>
                <a href="/register" class="btn btn-primary btn-sm ms-auto">
                  <i class="bi bi-person-plus-fill me-1"></i> Tambah Akun
                </a>
              </div>
            </div>


              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead class="table-dark">
                      <tr>
                          <th style="width: 50px">No</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Role</th>
                          {{-- <th style="width: 180px">Aksi</th> --}}
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($user as $index => $user)
                      <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if (Auth::user()->role == "admin" || Auth::user()->role == "supervisor")
                              <form action="/update-role/{{ $user->id }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  
                                  <td>
                                      <select name="role" class="form-select form-select-sm" style="height: 30px; width:150px;">
                                        
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        
                                        <option value="supervisor" {{ $user->role === 'supervisor' ? 'selected' : '' }}>Supervisor</option>

                                        @if ($user->role === 'user' || $user->role === 'kp_divisi' || $user->role === 'admin_accounting')
                                            
                                          <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                          
                                          <option value="kp_divisi" {{ $user->role === 'kp_divisi' ? 'selected' : '' }}>Kapten Divisi</option>
                                          
                                          <option value="admin_accounting" {{ $user->role === 'admin_accounting' ? 'selected' : '' }}>Admin Accounting</option>

                                        @endif

                                      </select>
                                      {{-- <td class="d-flex gap-1"> --}}
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-floppy me-1"></i></button>
                                      </td>
                              </form>

                            @else
                              <td>
                                @if ($user->role == "kp_divisi")
                                    Kepala Divisi
                                @elseif ($user->role == "admin_accounting")
                                    Admin Accounting
                                @else
                                    {{ $user->role }}
                                @endif  
                              </td>
                            @endif


                          </tr>
                      @endforeach
                  </tbody>
              </table>

              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
        
@include('admin.footer-admin')
</body>
</html>
