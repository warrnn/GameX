$(document).ready(function () {
    // Seller Table
    let sellertable = new DataTable("#sellerTable", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { title: "No", orderable: false },
            { data: "name", title: "Game Name" },
            { data: "price", title: "Price" },
            { data: "category_name", title: "Category" },
            { data: "publisher", title: "Publisher" },
            { data: "release_date", title: "Release Date" },
            { data: "base", title: "Base" },
            {
                data: "potrait_image_path",
                title: "Potrait Image",
                orderable: false,
            },
            {
                data: "landscape_image_path",
                title: "Landscape Image",
                orderable: false,
            },
            { title: "Actions", orderable: false },
        ],
    });

    let tablePromotions = new DataTable("#promotionsTable", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { title: "No", orderable: false },
            { data: "game_name", title: "Game Name" },
            { data: "discount", title: "Discount" },
            { title: "Discounted Price" },
            { title: "Actions", orderable: false },
        ],
    });

    let tableSellerTransaction = new DataTable("#sellerTransactionTable", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { title: "No", orderable: false },
            { data: "game_name", title: "Game" },
            { data: "transaction_data", title: "Date" },
            { data: "buyer_name", title: "Buyer" },
            {
                data: "shipping_number",
                title: "Shipping Number",
                orderable: false,
            },
            { data: "status", title: "Status" },
        ],
    });

    let tableOngoing = new DataTable("#ongoingTable", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { title: "No" },
            { data: "game", title: "Game" },
            { data: "transaction_date", title: "Date" },
            { data: "buyer_name", title: "Buyer" },
            { data: "status", title: "Status" },
        ],
    });

    let tableHistory = new DataTable("#historyTable", {
        paging: false,
        responsive: true,
        lengthChange: true,
        autoWidth: true,
        columns: [
            { title: "No" },
            { data: "game", title: "Game" },
            { data: "transaction_date", title: "Date" },
            { data: "buyer_name", title: "Buyer" },
            { data: "status", title: "Status" },
        ],
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
            {
                data: "profile_photo_path",
                title: "Profile Photo",
                orderable: false,
            },
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
            { data: "game_name", title: "Game" },
            { data: "buyer_name", title: "Buyer" },
            { data: "seller_name", title: "Seller" },
            {
                data: "shipping_number",
                title: "Shipping Number",
                orderable: false,
            },
            { data: "status", title: "Status" },
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
            { data: "user_id", title: "User ID", orderable: false },
            { data: "name", title: "Name" },
            { data: "email", title: "Email" },
            { title: "Actions", orderable: false },
        ],
    });
});
