$(document).ready(function($){

    tmpTable = "<table class='table table-striped'>"+
                "<thead>"+
                    "<tr>"+
                        "<th scope='col'># Empleado</th>"+
                        "<th>Empleado</th>"+
                        "<th>Rol</th>"+
                        "<th>Por Horas trabajadas</th>"+
                        "<th>Por Entregas</th>"+
                        "<th>Por Bonos</th>"+
                        "<th>Retenciones</th>"+
                        "<th>Vales</th>"+
                        "<th>Sueldo Bruto</th>"+
                        "<th>Sueldo Neto</th>"+
                    "</tr>"+
                "</thead>"+
                "<tbody>";

    $("#payMonth").on('change', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();

        var ajaxurl = 'pays/'+$('#payMonth').val();
        //var ajaxurl = 'employeeMonth';
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {idMonth:$('#payMonth').val()},
            dataType: 'json',
            success: function (data) {
                tmpPays = tmpTable;

                $.each(data, function(key, paySheets){
                    tmpPays +=
                        "<tr>"+
                            "<th scope='row'>"+paySheets.idEmployee+"</th>"+
                            "<td>"+paySheets.employee+"</td>"+
                            "<td>"+paySheets.rol+"</td>"+
                            "<td class='alignDe'> "+paySheets.hoursWorked+"</td>"+
                            "<td class='alignDe'> "+paySheets.deliveries+"</td>"+
                            "<td class='alignDe'> "+paySheets.bonus+"</td>"+
                            "<td class='alignDe'> "+paySheets.deductions+"</td>"+
                            "<td class='alignDe'> "+paySheets.vales+"</td>"+
                            "<td class='alignDe'> "+paySheets.perceptions+"</td>"+
                            "<td class='alignDe'> "+paySheets.total+"</td>"+
                        "</tr>";
                });
                tmpPays +=
                    "</tbody>"+
                "</table>";

                $('#divTablePaySheet').empty();
                $('#divTablePaySheet').append(tmpPays);
            },
            error: function (data) {
                alert(data.responseText);
                console.log(data);
            }
        });
    });
});