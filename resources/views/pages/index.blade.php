@extends('layouts.app_master_frontend')
@section('form-content')

    <div id="myDynamicTable"> </div>
    <div><button type="button" class="btn btn-block btn-success"> Gửi </button></div>

    <script>
        function addTable() {
        var myTableDiv = document.getElementById("myDynamicTable");
        
        var table = document.createElement('TABLE');
        table.border = '1';
        
        
        
        table.appendChild(thead);

        var tableBody = document.createElement('TBODY');
        table.appendChild(tableBody);
        
        
        for (var i = 0; i < 13; i++) {
            var tr = document.createElement('tr');
            tableBody.appendChild(tr);
        
            for (var j = 0; j < 7; j++) {
                var td = document.createElement('TD');
                td.width = '100';
                var form = create_form(5);
                td.appendChild(form);
                tr.appendChild(td);
                }
        }
        myTableDiv.appendChild(table);
        }

        addTable();

        function create_thead(somau) {
            var thead = document.createElement('THEAD');
            for (var i=0; i< 7; i++) {
            var x= document.createTextNode("Mau" + i);
            thead.appendChild(x);
            }
        }


        function create_form(rank) {
            var form = document.createElement("FORM");
                for (var r = 0; r<rank; r++) {
                    var x = document.createElement("INPUT");
                    x.setAttribute("type", "checkbox");
                    form.appendChild(x);
                }
            return form;
        }
        
    </script>
@endsection
