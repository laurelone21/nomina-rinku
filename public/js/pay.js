$(document).ready(function($){

    tmpTable = "<table class='table table-striped'>"+
                "<thead>"+
                    "<tr>"+
                        "<th scope='col'>#</th>"+
                        "<th>Mes</th>"+
                        "<th>Empleado</th>"+
                        "<th>Cantidad de entregas</th>"+
                        "<th></th>"+
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

        var ajaxurl = 'employeeMonth/'+$('#payMonth').val();
        //var ajaxurl = 'employeeMonth';
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {idMonth:$('#payMonth').val()},
            dataType: 'json',
            success: function (data) {
                employee = "<label for='payEmployee' class='form-label'>Empleado: </label>"+
                "<select id='payEmployee' name='payEmployee' class='form-select'>"+
                    "<option value='0' selected>Seleccionar...</option>";
                $.each(data, function(key, registro){
                    employee += "<option value='"+registro.idEmployee+"'>"+registro.employee+"</option>";
                });
                employee += "</select>";
                $('#divEmployee').empty();
                $('#divEmployee').append(employee);
            },
            error: function (data) {
                alert(data.responseText);
                console.log(data);
            }
        });
    });

    $("#payMonth").on('change', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();

        var ajaxurl = 'paysheet/'+$('#payMonth').val();
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {idMonth:$('#payMonth').val()},
            dataType: 'json',
            success: function (data) {
                tmpPays = tmpTable;
                if(data.length == 0){
                    $("#formPay").css("visibility", "hidden");
                }
                else{
                    $("#formPay").css("visibility", "visible");
                    $('#valueMonth').val($('#payMonth').val());
                }

                $.each(data, function(key, employee){
                    tmpPays +=
                        "<tr>"+
                            "<th scope='row'>"+employee.idTempPay+"</th>"+
                            "<td>"+employee.month+"</td>"+
                            "<td>"+employee.idEmployee+" - "+employee.employee+"</td>"+
                            "<td>"+employee.numberDeliveries+"</td>"+
                            "<td></td>"+
                        "</tr>";
                });
                tmpPays +=
                    "</tbody>"+
                "</table>";

                $('#divTableTmpPays').empty();
                $('#divTableTmpPays').append(tmpPays);
            },
            error: function (data) {
                alert(data.responseText);
                console.log(data);
            }
        });
    });

    $("#frmTempPays").on("submit", function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var ajaxurl = 'tempPays';
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: $('#frmTempPays').serialize(),
            dataType: 'json',
            success: function (data) {
                msj = "<h6 class='alert alert-success'>Registo exitoso</h6>";
                $('#msj').empty();
                $('#msj').append(msj);

                tmpPays = tmpTable;
                if(data.length == 0){
                    $("#formPay").css("visibility", "hidden");
                }
                else{
                    $("#formPay").css("visibility", "visible");
                    $('#valueMonth').val($('#payMonth').val());
                }
                $.each(data, function(key, employee){
                    tmpPays +=
                        "<tr>"+
                            "<th scope='row'>"+employee.idTempPay+"</th>"+
                            "<td>"+employee.month+"</td>"+
                            "<td>"+employee.idEmployee+" - "+employee.employee+"</td>"+
                            "<td>"+employee.numberDeliveries+"</td>"+
                            "<td></td>"+
                        "</tr>";
                });
                tmpPays +=
                    "</tbody>"+
                "</table>";
                $('#divTableTmpPays').empty();
                $('#divTableTmpPays').append(tmpPays);
                $("#payDeliveries").val("");
                limpiar( $('#payMonth').val() );
            },
            error: function (data) {
                alert(data.responseText);
                console.log(data);
            }
        });
    });

    function limpiar( idMonth ){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //e.preventDefault();

        var ajaxurl = 'employeeMonth/'+idMonth;
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {idMonth:idMonth},
            dataType: 'json',
            success: function (data) {
                employee = "<label for='payEmployee' class='form-label'>Empleado: </label>"+
                "<select id='payEmployee' name='payEmployee' class='form-select'>"+
                    "<option value='0' selected>Seleccionar...</option>";
                $.each(data, function(key, registro){
                    employee += "<option value='"+registro.idEmployee+"'>"+registro.employee+"</option>";
                });
                employee += "</select>";
                $('#divEmployee').empty();
                $('#divEmployee').append(employee);
            },
            error: function (data) {
                alert(data.responseText);
                console.log(data);
            }
        });
    }
});