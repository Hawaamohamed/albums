<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->
 
<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->
<script src="{{asset('assets/jquery.min.js')}}"></script>
<!-- BEGIN: Page JS-->
<script src="{{asset('assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
<!-- END: Page JS-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
<script>
   function bootstrapSelect(refresh = "") {
        $(".selectpicker").each(function (el) {
            var $this = $(this);
            if(!$this.parent().hasClass('bootstrap-select')){
                var selected = $this.data('selected');
                if( typeof selected !== 'undefined' ){
                    $this.val(selected);
                }
                $this.selectpicker({
                    size: 5,
                    noneSelectedText: '{{trans('lang.nothing_selected')}}',
                    virtualScroll: false
                });
            }
            if (refresh === "refresh") {
                $this.selectpicker("refresh");
            }
            if (refresh === "destroy") {
                $this.selectpicker("destroy");
            }
        });
    }
</script>

@yield('vendor-script')
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('assets/js/core/app.js')}}"></script>
 
 <script>
    function bootstrapSelect(refresh = "") {
         $(".selectpicker").each(function (el) {
             var $this = $(this);
             if(!$this.parent().hasClass('bootstrap-select')){
                 var selected = $this.data('selected');
                 if( typeof selected !== 'undefined' ){
                     $this.val(selected);
                 }
                 $this.selectpicker({
                     size: 5,
                     noneSelectedText: '{{trans('lang.nothing_selected')}}',
                     virtualScroll: false
                 });
             }
             if (refresh === "refresh") {
                 $this.selectpicker("refresh");
             }
             if (refresh === "destroy") {
                 $this.selectpicker("destroy");
             }
         });
     }
 </script>
 
 @yield('vendor-script')
 <!-- END: Page Vendor JS-->
 
 <!-- BEGIN: Theme JS-->
 <script src="{{asset('assets/js/core/app-menu.js')}}"></script>
 <script src="{{asset('assets/js/core/app.js')}}"></script>
  
 <script> 
    
     $(window).on('load', function() {
         if (feather) {
             feather.replace({
                 width: 14,
                 height: 14
             });
         }
     }); 
      
 </script>