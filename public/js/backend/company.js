$(document).ready(function () {
    $('#company_table').DataTable({
        ajax: {
            url: "http://localhost/test-junior-laravel-developer/public/api/company",
            dataSrc: 'data'
        },
        columns: [{
                data: 'id'
            },
            {
                data: 'name'
            },
            {
                data: 'email'
            },
            {
                data: 'website'
            },
        ]
    });
});
