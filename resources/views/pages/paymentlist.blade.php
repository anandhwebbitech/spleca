 @extends('layouts.app')
 @section('content')
<style>

/* ---- TABLE FONT SIZE ---- */
#paymentTable,
#paymentTable th,
#paymentTable td {
    font-size: 12px !important;   /* smaller text */
}

/* ---- TABLE HEADER ---- */
#paymentTable th {
    padding: 6px 8px !important;
}

/* ---- TABLE CELLS ---- */
#paymentTable td {
    padding: 6px 8px !important;
}

/* ---- VIEW BUTTON SMALL ---- */
#paymentTable .btn,
#paymentTable .btn-primary {
    font-size: 11px;
    padding: 3px 8px;
    border-radius: 4px;
}

/* ---- STATUS BADGE SMALL ---- */
#paymentTable .badge {
    font-size: 10px;
    padding: 4px 8px;
    border-radius: 8px;
}
#paymentTable {
    width: 100% !important;
}

#paymentTable th,
#paymentTable td {
    white-space: nowrap;   /* prevent wrapping */
    text-align: center;    /* optional - aligns nicely */
}
</style>

 <section class="page-banner">
     <div class="content-wrapper">
         <h1>Online Payment</h1>
         <div class="breadcrumb">
             <a href="index.php">
                 <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                     <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                     <polyline points="9 22 9 12 15 12 15 22"></polyline>
                 </svg>
                 Home
             </a>
             <span>/</span>
             <span>Payment List</span>
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

             <table class="table table-bordered table-hover nowrap" id="paymentTable" style="width:100%">
                 <thead>
                     <tr>
                         <th>S.No</th>
                         <th>Order Id</th>
                         <th>Customer Name</th>
                         <th>Payment Id</th>
                         <th>Total Amount</th>
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
    $('#paymentTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: false,
        autoWidth: false,
        ajax: "{{ route('paymentfetch') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'razorpay_order_id', name: 'razorpay_order_id' },
            { data: 'customer_name', name: 'customer_name' },
            { data: 'product_name', name: 'product_name' },
            { data: 'total_amount', name: 'total_amount' },
            { data: 'status', name: 'status' },
            
        ]
    });
});

 </script>
 @endpush

 @endsection