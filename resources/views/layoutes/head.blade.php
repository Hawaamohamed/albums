
<link rel="apple-touch-icon" href="{{asset('assets/images/ico/apple-icon-120.png')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/ico/favicon.ico')}}">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/vendors.min.css')}}"> 
<!-- END: Vendor CSS-->
 
 
 
<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-extended.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/components.css')}}"> 
 
<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
<!-- END: Custom CSS-->
 
<style> 
   .custom-card { 
 
    border: 1px solid #ccc;
    padding-top: 20px;
} .mb-3  {
    margin-bottom: 1rem !important;
} .bg-primary, .btn-primary {
    background-color: #00cfe8 !important;
} .badge {
    color: #8b8888;
} 
table tr td img {   
    width: 50px;
    height: 50px; 
}
table thead {   
    background: #eee;
}
.header-navbar.floating-nav { left: 0; width: auto}

html .content {  margin-left: 0; }
.container, .container-fluid, .container-xs, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl{  padding-right: 0;
    padding-left: 0; }

 </style>
{{-- Vendor Styles --}}
@yield('vendor-style')
<!-- END: Vendor CSS-->

@stack('css')
<!-- END: css CSS-->
