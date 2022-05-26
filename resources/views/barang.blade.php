<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> --}}


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- external css -->
    <link href="{{ asset('asset/css/common.css')}}" rel="stylesheet" type="text/css" />
    <!-- external js -->
    <script type="text/javascript" src="{{ asset('asset/js/common.js')}}"></script>
  </head>
  <body>
    <!-- Header Content Logo-->
    <div class="containerHeader">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <a href="/itemMaster">
                        <img class="imageLogoSize" src="{{ asset('asset/img/ruwindo.png') }}" alt="logoHeader">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="align-middle text-right" style="padding: 30px;">
                    <h2>Barang</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Barang Button and Search -->
    <div class="containerListAndSearch">
        <p>Welcome! {{ auth()->user()->name ?? '' }} {{ auth()->user()->id ?? '' }}<br> <a href="/logout">LogOut</a></p>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-addItem-modal-lg">Tambah Barang</button>
            </div>
            <div class="col ">
                <a href="/orderProcess" class="btn btn-success btn-sm float-right" type=button >Beli</a>
            </div>
        </div>
    </div>

    <!-- large Modal Insert dialog-->
    <div class="container">
        <div class="modal fade bd-addItem-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <form action="barang/storeBarang" method="post">
                @csrf
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" name="nameItem" required autocomplete="off">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Stock</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control numOnly" id="inputStock" name="stockItem" required autocomplete="off">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control numOnly" id="inputHarga" name="hargaItem" required autocomplete="off">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default" onclick="return confirm('Are you sure want to save this item?')">Save</button>
                                <button button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="containerListAndSearch" style="border-bottom: 3px solid black; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
        <!-- Table Header -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" class="tbHeader">No</th>
                            <th rowspan="2" class="tbHeader">Nama Barang</th>
                            <th rowspan="2" class="tbHeader">Stock</th>
                            <th rowspan="2" class="tbHeader">Harga</th>
                            <th rowspan="2" class="tbHeader">Action</th>
                        </tr>
                    </thead>
                    @foreach ($barang as $b)
                    <tbody>
                        <tr>
                            <td scope="row" class="tbActionBtn">{{$loop->iteration}}</td>
                            <td>{{ $b->nama_barang }}</td>
                            <td>{{ $b->stok }}</td>
                            <td>{{ $b->harga_jual }}</td>
                            <td class="tbActionBtn">
                                <a href="/barang/edit/{{ $b->id_barang }}" class="btn btn-success btn-sm" type=button >Edit</a>
                                <a href="/barang/deleteBarang/{{ $b->id_barang }}" class="btn btn-danger btn-sm" role="button" onclick="return confirm('Yakin Ingin Menghapus Barang Ini ?')">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>

  </body>
</html>
