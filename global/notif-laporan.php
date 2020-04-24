              <script>
                    $(document).ready(function(){
                     
                     function load_unseen_notification(view = '')
                     {
                      $.ajax({
                       url:"../../fetch-laporan.php",
                       method:"POST",
                       data:{view:view},
                       dataType:"json",
                       success:function(data)
                       {
                        $('.laporan-notif').html(data.notification);
                        if(data.unseen_notification > 0)
                        {
                         $('.hitung').html(data.unseen_notification);
                        }
                       }
                      });
                     }
                     
                     load_unseen_notification();
                     
                     $(document).on('click', '.dropdown-toggle-laporan-notif', function(){
                      $('.hitung').html('');
                      load_unseen_notification('yes');
                     });
                     
                     setInterval(function(){ 
                      load_unseen_notification();; 
                     }, 1000);
                     
                    });
                    </script>