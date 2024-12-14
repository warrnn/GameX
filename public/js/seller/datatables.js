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
    });

    let adminTableTransaction = new DataTable("#adminTableTransaction", {
        paging: false,
    });

    let adminTableAdmin = new DataTable("#adminTableAdmin", {
        paging: false,
    });
});
