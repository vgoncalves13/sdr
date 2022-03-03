@extends('adminlte::page')

@section('js')
    <script>

        $(function () {
            $('[data-tooltip="tooltip"]').tooltip()
        });

        $("#cnpj").inputmask({
            mask: "99.999.999/9999-99",
            removeMaskOnSubmit: true
        });
        $(".telephone").inputmask({
            mask: "(99) 9999-9999",
            removeMaskOnSubmit: true
        });
        $(".cellphone").inputmask({
            mask: "(99) 99999-9999",
            removeMaskOnSubmit: true
        });
        $("#postal_code").inputmask({
            mask: "99999-999",
            removeMaskOnSubmit: true
        });

        function deleteInput(div_id) {
            $(div_id).fadeOut(300, function () {
                $(this).remove()
            });
        }
        function createInput() {

            var children = $('#container-input-services').children();
            if(children.length === 0){
                var id_select = 1;
                var id_array = 0;
            } else {
                id = (children[children.length - 1].id);
                var num_id = id.split('_');
                id_select = num_id[1];
                id_select++;
                id_array = id_select;
                id_array--;
            }

            var div_card = $('<div>').attr({
                class: 'card',
                id: 'card_' + id_select
            });
            $('<div>').attr({
                class: 'card-body',
                id: 'card_body_' + id_select
            }).appendTo(div_card);

            div_card.appendTo('#container-input-services');

            $('<label>').attr({
                for:'service_' + id_select,
            }).text('Serviço').appendTo('#card_body_' + id_select);
            $('<select>').attr({
                id: 'service_' + id_select,
                name: "services[" +  id_array  + "][service_id]",
                class: 'form-control'
            }).appendTo('#card_body_' + id_select);

            $('<label>').attr({
                for: 'service_quantity_' + id_select,
            }).text('Quantidade').appendTo('#card_body_' + id_select);
            $('<input>').attr({
                type: 'text',
                id: 'service_quantity_' + id_select,
                name: "services[" +  id_array  + "][quantity]",
                class: 'form-control'
            }).appendTo('#card_body_' + id_select);
            $('<input />',{
                type: 'button',
                value: '+',
                class: 'btn btn-primary',
                on: {
                    click: function () {
                        createInput();
                    }
                }
            }).appendTo('#card_body_' + id_select);
            $('<input />',{
                type: 'button',
                value: '-',
                class: 'btn btn-danger',
                on: {
                    click: function () {
                        deleteInput('#card_body_' + id_select);
                    }
                }
            }).appendTo('#card_body_' + id_select);

            populateSelect(id_select);
        }
        function populateSelect(id_select) {
            $.ajax({
                url:'/api/getServicesList/',
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                    if (len>0) {
                        for (var i = 0; i<len; i++) {

                            var id = response.data[i].id;
                            var name = response.data[i].name;

                            var option = "<option value='"+ id +"'>"+name+"</option>";

                            $("#service_" + id_select).append(option);
                        }
                    }
                }
            });
        }
    </script>
@endsection
