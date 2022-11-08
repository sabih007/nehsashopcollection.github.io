 <!-- MDB -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script>
     $(document).ready(function() {
         $("#success-alert").hide();

         $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
             $("#success-alert").slideUp(500);
         });

     })
 </script>
 <script>
     function deleteCustomer(id) {
         if(confirm('Are You Sure You Want to delete.?'))
             document.getElemenyById('customer-edit-action-'+id).submit();
     }
 </script>
 @include('sweetalert::alert')

</body>

</html>