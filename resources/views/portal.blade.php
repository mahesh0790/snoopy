@extends('layout')
@section('content')
    <div class="row">
    <div class="col-md-8 offset-md-2">
   <div class="table-responsive text-center py-5 "> 
   <a class="btn btn-info col-md-3 offset-md-8 mb-4" href="/portalview">Create New Portal Admin</a>
   <table class="table table-bordered table-light">
        <thead class="thead-light">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th ></th>
            </tr>
        </thead>
         @foreach($portal_admins as $portal_admin)
        <tbody>
             <tr>
            <th scope="row"><h4>{{$loop->iteration}}</h4></th>
            <td><h4>{{$portal_admin->first_name}}</h4></td>
            <td><a  value="EDIT" class="btn btn-primary" href="/portal/{{$portal_admin->id}}">Edit</a>
            <button type="button" value="delete" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter" onclick="deleteData({{$portal_admin->id}})" >Delete</button></td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
</div>
</div>
           <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="row">
                            <div class="col-md-12">
                            <form action="" id="deleteForm" method="post">
                                <div class="modal-content" style="width:400px">
                                <div class="modal-header ">
                                  <p class="modal-title " id="exampleModalLongTitle"><h3>DELETE PORTAL ADMIN</h3></p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                    <h3 class="text-center">Are you sure?</h3>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">CLOSE</button>
                                    <button type="submit"  class="btn btn-primary"data-dismiss="modal" onclick="formSubmit()">YES</button>
                                </div>
                                </div>
                                </form>
                                </div>
                            </div>
                             </div>
</div>                  

                  
            </div>
        </div>
    
<script>
        document.getElementById("txtTest").addEventListener("input", forceLower);
        document.getElementById("txtTest1").addEventListener("input", forceLower);

        function forceLower(evt) {
            var words = evt.target.value.toLowerCase().split(/\s+/g);
            var newWords = words.map(function(element){   
                return element !== "" ?  element[0].toUpperCase() + element.substr(1, element.length) : "";
            });
            evt.target.value = newWords.join(" "); 
}

</script>
<script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url = '{{ route("portal.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  
  </script>
  <script type = "text/javascript">
         <!--
            function Warn() {
               alert ("A Mail has been sent to Admin Email id with login details!");
               
            }
         //-->
      </script> 
@endsection