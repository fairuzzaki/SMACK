@extends('admin/layout')

@section('content')


<div class="row">
      <div class="col-md-12">
       
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Username</th>
              <th>E-mail</th>
            </tr>
          </thead>

          <tbody>
            
            @foreach($user as $user)
            
            <tr>
              <td>
                  <img src="{{ url('upload/'.$user->photo)}}" id="profil" alt="foto"  style="width: 50px">
              </td>

              <td>
                {{$user->username}}
              </td>

              <td>
                {{$user->email}}
              </td>

              <td>

                <button onclick="hapus('{{$user->id}}')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
              </td>
            
            </tr>
            
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

  </div>


    <!-- pop up delete data member yang akan di tampilkan -->
     <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="delete_member">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
              </div>
              <div class="modal-body">
                <form name="form_delete_member" action="{{ url('admin/deleteMember')}}" method="post" enctype="multipart/form-data">
                  <div class="col-md-12"><input type="hidden" name="Id"></div>
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
        function hapus(id)
          {
              document.forms['form_delete_member']['Id'].value=id;
              $('#delete_member').modal('show');
          }
    </script>

@endsection