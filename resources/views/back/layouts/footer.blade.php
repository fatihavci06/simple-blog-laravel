           </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Blog Sitesi Admin {{date('Y')}}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('back/')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('back/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('back/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('back/')}}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{asset('back/')}}/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('back/')}}/js/demo/chart-area-demo.js"></script>
    <script src="{{asset('back/')}}/js/demo/chart-pie-demo.js"></script>
     <script src="{{asset('back/')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('back/')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
     <script src="{{asset('back/')}}/js/demo/datatables-demo.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
         <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
          <script type="text/javascript">
               $('#orders').sortable({
                axis: 'y',
                update: function (event, ui) {

                    var sayfa = $(this).sortable('serialize');
                    
                    // POST to server using $.post or $.ajax
                    $.ajax({
                        data: sayfa,
                        type: 'GET',
                        url: "{{route('admin.page.siralama')}}",
                        success: function(Cevap){
                                $('#sonuc').html('<div class="alert alert-success">Sıralama değişti</div>');
                                $('#sonuc').fadeOut(1000);
                                                
                        }
                    });
                }
            });
                      </script>
     <script>

    $(document).ready(function() {
        $('#summernote').summernote({
            'height':300,


        });
    });
  </script>
  <script>

  $(function() {
    $('.switch').change(function() {
      var id=$(this).attr("data-id");
      var status=$(this).prop('checked');
      $.ajax({
            data: {id:id,status:status},
            type: "get",
            url: "{{route('back.makaleler.switch')}}",
            success: function(Cevap){
                    alert(Cevap);

                                    
            }
        });
        
    })
  })
</script>
@toastr_js
@toastr_render
<script type="text/javascript">


function silmedenSor (gidilecekLink,count=0) {
    if(count>1){
        var title="Bu kategoriye ait "+count+" adet içerik bulunmaktadır.Silmek istediğine emin misin?";
        var buton=false;
    }
    else{
        var title="Silmek istediğine emin misin?";
        var buton='Evet';
    }
  swal({

  title: title,
  text: "Silinen kayıt geri alınamaz.",
  icon: "warning",
  buttons: true,
  dangerMode: true,

  buttons: {        
                cancel: "İptal", //string, true, false
                confirm: buton,
                
            }
})
.then((willDelete) => {

  if (willDelete) {
    swal({title:"Silme başarılı", icon: "success",button: {     
                text: "Tamam", //string, true, false
                
                
            }});
        setTimeout(function(){   
        window.location=gidilecekLink;
        //3 saniye sonra yönlenecek
        }, 1000);
  } else {
    swal({title:"Silme işleminden vazgeçtiniz.", icon: "warning",button: {       
                text: "Tamam", //string, true, false
                
                
            },});
  }
});
    
}
$(document).on('click','.editk',function(e) {
       

              var id=$(this).attr("data-id");
              var _token = $("input[name='_token']").val();
              $.ajax({
                data: {id:id,_token: _token},
                type: "post",
                url: "{{route('category.get')}}",
                success: function(Cevap){
                       
                       $('#editmodal').modal('show');
                        $('#category').val(Cevap.name);
                        $('#slug').val(Cevap.slug);
                        $('#category_id').val(Cevap.id);


                                        
                }
            });

      });
  

</script>
</body>

</html>