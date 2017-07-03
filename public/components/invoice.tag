<invoice>
    <div class="well well-sm">
        <div class="row">
            <div class="col-xs-6">
                <input id="client" class="form-control typeahead" type="text" placeholder="Cliente" />
            </div>
            <div class="col-xs-2">
                <input class="form-control" type="text" placeholder="C.I o Rif" readonly value="{identity}" />
            </div>
            <div class="col-xs-4">
                <input class="form-control" type="text" placeholder="Dirección" readonly value="{address}" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-7">
            <input id="product" class="form-control" type="text" placeholder="Nombre del producto" />
        </div>
        <div class="col-xs-2 ">
            <input id="quantity" class="form-control" type="text" placeholder="Cantidad" />

        </div>
        <div class="col-xs-2">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">S/.</span>
                <input class="form-control" type="text" placeholder="Precio" value="{sale_price}" readonly />
            </div>
        </div>
        <div class="col-xs-1">
            <button onclick={__addProductToDetail} class="btn btn-primary form-control" id="btn-agregar">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>

    <hr />
    	<div class="row">
          	<div class="col-xs-2">
				<button if={detail.length > 0 && client_id > 0} onclick={__save} class="btn btn-success btn-lg btn-block">
                        Guardar
                    </button>
             </div>
            <div class="col-xs-6 col-xs-offset-4 ">
				<h2 class="text-right">
					<tr>
                       <td colspan="12" class="text-right"><b>Total a Pagar</b></td>
                       <td class="text-right">$ {total.toFixed(2)}</td>
                    </tr>
                </h2>
             </div>
        </div>
    <hr />

    <table class="table table-striped">
        <thead if={detail.length > 0 && client_id > 0}>
        <tr>
            <th style="width:40px;"></th>
            <th>Producto</th>
            <th style="width:100px;">Cantidad</th>
            <th style="width:100px;">P.U</th>
            <th style="width:100px;">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr each={detail}>
            <td>
                <button onclick={__removeProductFromDetail} class="btn btn-danger btn-xs btn-block">X</button>
            </td>
            <td>{name}</td>
            <td class="text-center">{quantity}</td>
            <td class="text-center">$ {price}</td>
            <td class="text-center">$ {total}</td>
        </tr>
        </tbody>
        <tfoot if={detail.length > 0 && client_id > 0}>

        <tr>
            <td colspan="4" class="text-right"><b>Sub Total</b></td>
            <td class="text-right">$ {iva.toFixed(2)}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>IVA</b></td>
            <td class="text-right">$ {subTotal.toFixed(2)}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Total a Pagar</b></td>
            <td class="text-right">$ {total.toFixed(2)}</td>
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
            	if (self.sale_price.value==0)
                    {
                       	alert("Ingrese Nombre o Codigo del Producto! ");
                       	sale_price.focus();
                       	return false;
                    }


            self.detail.push({
                id: self.product_id,
                name: self.product.value,
                quantity: parseFloat(self.quantity.value),
                price: parseFloat(self.sale_price),
                total: parseFloat(self.sale_price * self.quantity.value)
            });

            self.product_id = 0;
            self.product.value = '';
            self.quantity.value = '';
            self.sale_price = '';

            __calculate();
        }

        __save() {
            $.post(baseUrl('invoice/save'), {
                client_id: self.client_id,
                iva: self.iva,
                subTotal: self.subTotal,
                total: self.total,
                detail: self.detail
            }, function(r){
				if(r.response) {
                	window.location.href = baseUrl('invoice/add');
                } else {
                 alert('Ocurrio un error');
                 }
            }, 'json')

        }

        function __calculate() {
            var total = 0;

            self.detail.forEach(function(e){
                total += e.total;
            });

            self.total = total;
            self.subTotal = parseFloat(total / 12);
            self.iva = parseFloat(total - self.subTotal);
        }

        function __clientAutocomplete(){
            var client = $("#client"),
                options = {
                url: function(q) {
                    return baseUrl('invoice/findClient?q=' + q);
                },
                getValue: 'name',
                list: {
                    onClickEvent: function() {
                        var e = client.getSelectedItemData();
                        self.client_id = e.id;
                        self.identity = e.identity;
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
                    return baseUrl('invoice/findProduct?q=' + q);
                },
                getValue: 'name',
                list: {
                    onClickEvent: function() {
                        var e = product.getSelectedItemData();
                        self.product_id = e.id;
                        self.sale_price = e.sale_price;

                        self.update();
                    }
                }
            };

            product.easyAutocomplete(options);
        }
    </script>
</invoice>