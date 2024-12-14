$(document).ready(function () {
    // Seller Table
    let sellertable = new DataTable("#sellerTable", {
        paging: false,
    });

    let tableOngoing = new DataTable("#ongoingTable", {
        paging: false,
    });

    let tableHistory = new DataTable("#historyTable", {
        paging: false,
    });

    // Admin Table
    let adminTableUser = new DataTable("#adminTableUser", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { data: 'name', title: 'Name' },
            { data: 'email', title: 'Email' },
            { data: 'actions', title: 'Actions', orderable: false }
        ],
    });
    

    let adminTableSeller = new DataTable("#adminTableSeller", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { data: 'user_id', title: 'User ID' },
            { data: 'address', title: 'Address' },
            { data: 'phone', title: 'Phone' },
            { data: 'actions', title: 'Actions', orderable: false }
        ],
    });

    let adminTableTransaction = new DataTable("#adminTableTransaction", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { data: 'transaction_date', title: 'Transaction Date' },
            { data: 'shipping_number', title: 'Shipping Number' },
            { data: 'status', title: 'Status' },
            { data: 'payment_proof', title: 'Payment Proof', orderable: false },
            { data: 'actions', title: 'Actions', orderable: false }
        ],
    });

    let adminTableCategory = new DataTable("#adminTableCategory", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { data: 'name', title: 'Category Name' },
            { data: 'actions', title: 'Actions', orderable: false }
        ],
    });

    let adminTableAdmin = new DataTable("#adminTableAdmin", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { data: 'user_id', title: 'User ID' },
            { data: 'address', title: 'Address' },
            { data: 'phone', title: 'Phone' },
            { data: 'actions', title: 'Actions', orderable: false }
        ],
    });
});
