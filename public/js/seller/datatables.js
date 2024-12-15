$(document).ready(function () {
    // Seller Table
    let sellertable = new DataTable("#sellerTable", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { data: "iteration", title: "No" },
            { data: "name", title: "Game Name" },
            { data: "price", title: "Price" },
            { data: "category_name", title: "Category" },
            { data: "publisher", title: "Publisher" },
            { data: "release_date", title: "Release Date" },
            { data: "base", title: "Base" },
            { data: "potrait_image_path", title: "Potrait Image", orderable: false },
            { data: "landscape_image_path", title: "Landscape Image", orderable: false },
            { title: "Actions", orderable: false },
        ]
    });

    let tablePromotions = new DataTable("#promotionsTable", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
    });

    let tableSellerTransaction = new DataTable("#sellerTransactionTable", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
    });

    let tableOngoing = new DataTable("#ongoingTable", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
    });

    let tableHistory = new DataTable("#historyTable", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
    });

    // Admin Table
    let adminTableUser = new DataTable("#adminTableUser", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { data: "name", title: "Name" },
            { data: "email", title: "Email" },
            { data: "profile_photo_path", title: "Profile Photo", orderable: false },
        ],
    });

    let adminTableSeller = new DataTable("#adminTableSeller", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { data: "user_id", title: "Name" },
            { data: "email", title: "Email" },
            { data: "domicile", title: "Domicile" },
            { data: "address", title: "Address" },
            { data: "phone", title: "Phone" },
            { data: "status", title: "Status" },
            { data: "actions", title: "Actions", orderable: false },
        ],
    });

    let adminTableTransaction = new DataTable("#adminTableTransaction", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { data: "transaction_date", title: "Transaction Date" },
            { data: "shipping_number", title: "Shipping Number" },
            { data: "status", title: "Status" },
            { data: "payment_proof", title: "Payment Proof", orderable: false },
            { data: "actions", title: "Actions", orderable: false },
        ],
    });

    let adminTableCategory = new DataTable("#adminTableCategory", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { data: "name", title: "Category Name" },
            { data: "actions", title: "Actions", orderable: false },
        ],
    });

    let adminTableAdmin = new DataTable("#adminTableAdmin", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { data: "user_id", title: "User ID" },
            { data: "address", title: "Address" },
            { data: "phone", title: "Phone" },
            { data: "actions", title: "Actions", orderable: false },
        ],
    });
});
