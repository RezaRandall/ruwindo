<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- external css -->
    <link href="{{ asset('asset/css/common.css')}}" rel="stylesheet" type="text/css" />
    <!-- external js -->
    <script type="text/javascript" src="{{ asset('asset/js/common.js')}}"></script>
    <title>Edit Item</title>
</head>
<body>
    <br>
<!-- Header -->
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
                    <h2>Edit Barang</h2>
                </div>
            </div>
        </div>
    </div>

<div class="containerListItemMaster">
    <div class="card">
        <div class="card-body">
            <div class="modal-header">
                <h4 class="modal-title">Update Item Master</h4>
            </div>
                <div class="modal-body">
                @foreach($editBarang as $edit)
                <form action="/barang/update" method="post">
                {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="inputId" name="id" value="{{ $edit->id_barang  }}" readonly>
                                <input type="text" class="form-control" id="inputNama" name="namaItem" value="{{ $edit->nama_barang }}" required>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputStok" name="stokItem" value="{{ $edit->stok }}" required readonly>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Harga Jual</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputHarga" name="HargaItem" value="{{ $edit->harga_jual }}" required>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="qtyTotalUpdate" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="form-group col-md-3">Item Ready
                            <input type="number" class="form-control" id="qtyTotalUpdate" name="QtyItem" value="{{ $edit->stok }}" readonly>
                        </div>
                        <div class="form-group col-md-3">Add
                            <input type="text" class="form-control" id="addQty" name="addQty">
                        </div>
                        <div class="form-group col-md-3">Total
                            <input type="number" class="form-control" id="afterAddQtyTotal" name="qtyTotal" readonly >
                        </div>
                    </div>

                     <div class="modal-footer">
                       <button type="submit" class="btn btn-default" onclick="return confirm('Are you sure want to update this item?')">Update</button>
                       <!-- <a href="/itemMaster" class="btn btn-default" role="button" data-dismiss="modal">Cancel</a> -->
                       <!-- <button type="button" class="btn btn-default" data-dismiss="modal" onclick="relocate_itemMaster()">Cancel</button> -->
                       <input type="button" class="btn btn-default" value="Cancel" onclick=" relocate_home()">
                     </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    function relocate_home()
    {
        location.href = "/barang";
    }
</script>
</body>
</html>
