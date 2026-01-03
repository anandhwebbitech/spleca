 @extends('layouts.app')
 @section('content')

 <section class="page-banner">
     <div class="content-wrapper">
         <h1>Orders</h1>
         <div class="breadcrumb">
             <a href="index.php">
                 <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                     <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                     <polyline points="9 22 9 12 15 12 15 22"></polyline>
                 </svg>
                 Home
             </a>
             <span>/</span>
             <span>Order List</span>
         </div>
     </div>
 </section>


 <section class="about-hero">
     <div class="bg-decoration bg-decoration-1"></div>
     <div class="bg-decoration bg-decoration-2"></div>
 </section>



 <section class="form-sec">
     <div class="inquiry-wrapper">
         <div class="row g-0">
            <div class="table-responsive">

             <table class="table table-bordered nowrap" id="orderTable" style="width:100%">
                 <thead>
                     <tr>
                         <th>S.No</th>
                         <th>Action</th>
                         <th>Order Id</th>
                         <th>Customer Name</th>
                         <th>Product Name</th>
                         <th>Discount</th>
                         <th>Total Amount</th>
                         <th>Order Date</th>
                         <th>Delivery Date</th>
                         <th>Status</th>
                     </tr>
                 </thead>
             </table>
             </div>
         </div>

     </div>
 </section>

 @push('scripts')
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

 <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
     //  
     // 
     let table;

  $(document).ready(function () {
    $('#orderTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ajax: "{{ route('orderfetch') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false },
            { data: 'order_id', name: 'order.id' },
            { data: 'customer_name', name: 'order.user.name' },
            { data: 'product_name', name: 'product.name' },
            { data: 'discount', name: 'discount' },
            { data: 'total_amount', name: 'total_price' },
            { data: 'order_date', name: 'order.created_at' },
            { data: 'delivery_date', name: 'order.delivery_date' },
            { data: 'status', name: 'status', orderable: false, searchable: false },
        ]
    });
});

 </script>
 @endpush

 @endsection