@extends('outlet/layout')

@section('content')

<div class="row">
      <div class="col-md-12">
        <button class="btn btn-primary" onclick="add_menu()"><i class="glyphicon glyphicon-plus"></i> ADD DATA</button>
      </div>
</div>


<div class="row">
      <div class="col-md-12">
       
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Foto</th>
              <th>name</th>
              <th>Price</th>
              <th>description</th>
              <th>rating</th>
            </tr>
          </thead>

          <tbody>
            
            @foreach($menu as $menu)
            
            <tr>
              <td>
                  <img src="{{ url('upload/'.$menu->photo)}}" id="profil" alt="foto"  style="width: 50px">
              </td>

              <td>
                {{$menu->name}}
              </td>

              <td>
                {{$menu->price}}K
              </td>

              <td>
                {{$menu->description}}
              </td>

              <td>
                {{$menu->rating}}
              </td>

              <td>

                <button onclick="edit_menu('{{$menu->id}}','{{$menu->name}}','{{$menu->price}}','{{$menu->description}}')" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>

                <button onclick="hapus('{{$menu->id}}')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>

              </td>
            
            </tr>
            
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

  </div>




 <!-- pop up tambah data member yang akan di tampilkan -->
     <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="add_menu">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Masukkan Data Menu</h4>
              </div>
              <div class="modal-body">
                
                <form name="login1" action="{{ url('outlet/addMenu')}}" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-2">Name</div>
                  <div class="col-md-10"><input type="text" name="name" style="width: 50%" required=""></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Price</div>
                  <div class="col-md-10"><input type="text" name="price" style="width: 50%" required=""></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Description</div>
                  <div class="col-md-10"><textarea name="description" cols="65" rows="10"></textarea></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Foto</div>
                  <div class="col-md-10"><input type="file" name="foto" required=""></div>
                </div>
                <br>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="TUTUP">
                <input type="submit" class="btn btn-primary" value="SIMPAN">
              </div>
                {{csrf_field()}}
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->






    <!-- pop up edit data member yang akan di tampilkan -->
     <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="edit_menu">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Menu</h4>
              </div>
              <div class="modal-body">
                <form name="form_edit_menu" action="{{ url('outlet/updateMenu')}}" method="post" enctype="multipart/form-data">
                  <div class="col-md-12"><input type="hidden" name="id"></div>
                <div class="row">
                  <div class="col-md-2">Name</div>
                  <div class="col-md-10"><input type="text" name="name" style="width: 50%" required=""></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Price</div>
                  <div class="col-md-10"><input type="text" name="price" style="width: 50%" required=""></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Description</div>
                  <div class="col-md-10"><textarea name="description" cols="65" rows="10"></textarea></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Foto</div>
                  <div class="col-md-10"><input type="file" name="foto"></div>
                </div>
                <br>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="TUTUP">
                <input type="submit" class="btn btn-primary" value="SIMPAN">
              </div>
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->


    <!-- pop up delete data member yang akan di tampilkan -->
     <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="delete_menu">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
              </div>
              <div class="modal-body">
                <form name="form_delete_menu" action="{{ url('outlet/deleteMenu')}}" method="post" enctype="multipart/form-data">
                  <div class="col-md-12"><input type="hidden" name="id"></div>
                  <p>Apakah anda yakin ingin menghapus data ini ?</p>
                    <br>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                    <input type="submit" class="btn btn-primary" value="Ya">
                  </div>
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="DELETE">
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->



    <!-- Fungsi Untuk menampilkan PopUp -->
    <script>
        function add_menu()
            {
              $('#add_menu').modal('show');
            }
        function edit_menu(id,name,price,description)
            {
              document.forms['form_edit_menu']['name'].value=name;
              document.forms['form_edit_menu']['price'].value=price;
              document.forms['form_edit_menu']['description'].value=description;
              document.forms['form_edit_menu']['id'].value=id;
                $('#edit_menu').modal('show');
            }
            function hapus(id)
          {
              document.forms['form_delete_menu']['id'].value=id;
              $('#delete_menu').modal('show');
          }
    </script>

@endsection