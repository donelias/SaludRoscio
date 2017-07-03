<invoice>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="well well-sm col-xs-6">
        <div class="row">
            <div class="col-xs-12">
                <input id="client" class="form-control typeahead" type="text" placeholder="Cliente" />
            </div>
             <hr>
            <div class="col-xs-4">
                <input class="form-control" type="text" placeholder="C.I o Rif" readonly value="{identificationcard}" />
            </div>
            <div class="col-xs-8">
                <input class="form-control" type="text" placeholder="Dirección" readonly value="{address}" />
            </div>
        </div>
    </div>

    <div class="row col-xs-6">
        <div class="col-xs-8">
            <input id="product" class="form-control" type="text" placeholder="Nombre del producto" />
        </div>
        <div class="col-xs-4 ">
            <input id="quantity" class="form-control" type="text" placeholder="Cantidad" />
			 <input id="stock" class="form-control" type="hidden" value="{quantityexisting}" />
        </div>
        <hr>
        <div class="col-xs-12">
            <button onclick={__addProductToDetail} class="btn btn-primary form-control" id="btn-agregar">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
        <hr>
        <hr>
        <div class="col-xs-12">
            <button if={detail.length > 0 && client_id > 0} onclick={__save} class="btn btn-success btn-block">
                  Procesar Orden
            </button>
        </div>

    </div>

    <hr />
        <div class="row">

        </div>
    <hr />

    <table class="table table-hover" style="margin:0px" if={detail.length > 0 && client_id > 0}>
        <thead>
        <tr>
            <th style="width:40px;"></th>
            <th>Codigo</th>
            <th>Producto</th>
            <th>Tipo</th>
            <th>Laboratorio</th>
            <th style="width:100px;">Cantidad</th>
        </tr>
        </thead>
        <tbody>
        <tr each={detail}>
            <td>
                <button onclick={__removeProductFromDetail} class="btn btn-danger btn-xs btn-block">X</button>
            </td>
            <td>{code}</td>
            <td>{name}</td>
            <td>{drug}</td>
            <td>{laboratory}</td>
            <td class="text-center">{quantity}</td>
        </tr>
        </tbody>
        <tfoot if={detail.length > 0 && client_id > 0}>
        <tr></tr>
        <tr>
            <td colspan="4" class="text-center">Total Unidades en la Orden {total}</td>
        </tr>
        </tfoot>
    </table>

    <button if={detail.length > 0 && client_id > 0} onclick={__save} class="btn btn-default btn-lg btn-block">
        Guardar
    </button>

    <script>
        var self = this;

        // Detalle del comprobante
        self.client_id = 0;
        self.detail = [];
        self.iva = 0;
        self.subTotal = 0;
        self.total = 0;

        self.on('mount', function(){
            __clientAutocomplete();
            __productAutocomplete();
        })

        __removeProductFromDetail(e) {
            var item = e.item,
                index = this.detail.indexOf(item);

            this.detail.splice(index, 1);
            __calculate();
        }

        __addProductToDetail() {

                if (self.client.value==0)
                   {
                        alert("Ingrese Nombre o Cedula del Cliente! ");
                        client.focus();
                        return false;
                   }
                if (self.product.value==0)
                    {
                        alert("Ingrese Nombre o Codigo del Producto! ");
                        product.focus();
                        return false;
                    }
                if (self.quantity.value==0)
                    {
                        alert("Ingrese la Cantidad del Producto! ");
                        quantity.focus();
                        return false;
                    }
                if (self.quantity.value > self.stock.value)
                    {
                       alert("No quedan unidades sufucientes para Agregar a esta orden! \n Unidades Disponibles: " + self.stock.value  );
                       product.focus();
                       return false;

                    }


            self.detail.push({
                id: self.product_id,
                code: self.code,
                name: self.product.value,
                quantity: parseFloat(self.quantity.value)
                
            });

            self.product_id = 0;
            self.product.value = '';
            self.quantity.value = '';

            __calculate();
        }

        __save() {
            $.get(baseUrl('order/saveOut'), {
                client_id: self.client_id,
                total: self.total,
                detail: self.detail
            }, function(r){
                if(r.response) {
                    window.location.href = baseUrl('/order/out');
                } else {
                 alert('Ocurrio un error');
                 }
            }, 'json')

        }

        function __calculate() {
            var total = 0;

            self.detail.forEach(function(e){
                total += e.quantity;
            });

            self.total = total;

        }

        function __clientAutocomplete(){
            var client = $("#client"),
                options = {
                url: function(q) {
                    return baseUrl('order/findClient?q=' + q);
                },
                getValue: 'name',
                list: {
                    onClickEvent: function() {
                        var e = client.getSelectedItemData();
                        self.client_id = e.id;
                        self.identificationcard = e.identificationcard;
                        self.address = e.address;

                        self.update();
                    }
                }
            };

            client.easyAutocomplete(options);
        }

        function __productAutocomplete(){
            var product = $("#product"),
                options = {
                url: function(q) {
                    return baseUrl('order/findProduct?q=' + q);
                },
                getValue: 'name',
                template: {
                  	type: "custom",
                    method: function(value, item) {
            			return   item.expiration_date + " | " + value + " | " + item.drug + " | " + item.laboratory + " | ";

                        }
                    },
                list: {
                    onClickEvent: function() {
                        var e = product.getSelectedItemData();
                        self.product_id = e.id;
                        self.product_name = e.product_name;
                        self.code = e.code;
                        self.quantityexisting = e.quantityexisting;
                        self.laboratory = e.laboratory;
                        self.drug = e.drug;

                        self.update();
                    }
                }
            };

            product.easyAutocomplete(options);
        }
    </script>
</invoice>