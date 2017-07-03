<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->

    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap_invoice.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/custom-style.css" rel="stylesheet" />
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />

</head>
<body>
<div class="container">

    <div class="row pad-top-botm ">
        <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="assets/img/salud.jpg"  width="150" high="150" />
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">

            <strong>  Coordinación Municipal de Salud Juan German Rosccio</strong>
            <br />
            <i>Dirección :</i> Av. Bolivar, frente a la plaza de los samanes,
            <br />
            San Juan de los Morros, Edo. Guarico,
            <br />
            Venezuela.

        </div>
    </div>
    <div  class="row text-center contact-info">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <hr />
             <span>
                 <strong>Correo Electronico : </strong>  info@yourdomain.com
             </span>
             <span>
                 <strong>Telefono : </strong>  +58 - 246- 431- 2410
             </span>
              <span>
                 <strong>Fax : </strong>  +58 - 246- 431- 2410
             </span>
            <hr />
        </div>
    </div>
    <div  class="row pad-top-botm client-info">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4>  <strong>Información del Proveedor</strong></h4>
            <strong>  Jhon Deo Chuixae</strong>
            <br />
            <b>Address :</b> 145/908 , New York Lane,
            <br />
            United States.
            <br />
            <b>Call :</b> +90-908-567-0987
            <br />
            <b>E-mail :</b> info@clientdomain.com
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">

            <h4>  <strong>Orden de Entrada </strong></h4>
            <b>Bill Amount :  990 USD </b>
            <br />
            Bill Date :  01th August 2014
            <br />
            <b>Payment Status :  Paid </b>
            <br />
            Delivery Date :  10th August 2014
            <br />
            Purchase Date :  30th July 2014
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Perticulars</th>
                        <th>Quantity.</th>
                        <th>Unit Price</th>
                        <th>Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Website Design</td>
                        <td>1</td>
                        <td>300 USD</td>
                        <td>300 USD</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Plugin Dev.</td>
                        <td>2</td>
                        <td>200 USD</td>
                        <td>400 USD</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Hosting Domains</td>
                        <td>2</td>
                        <td>100 USD</td>
                        <td>200 USD</td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <hr />
            <div class="ttl-amts">
                <h5>  Total Amount : 900 USD </h5>
            </div>
            <hr />
            <div class="ttl-amts">
                <h5>  Tax : 90 USD ( by 10 % on bill ) </h5>
            </div>
            <hr />
            <div class="ttl-amts">
                <h4> <strong>Bill Amount : 990 USD</strong> </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <strong> Important: </strong>
            <ol>
                <li>
                    This is an electronic generated invoice so doesn't require any signature.

                </li>
                <li>
                    Please read all terms and polices on  www.yourdomaon.com for returns, replacement and other issues.

                </li>
            </ol>
        </div>
    </div>
    <div class="row pad-top-botm">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <hr />
            <a href="#" class="btn btn-primary btn-lg" >Print Invoice</a>
            &nbsp;&nbsp;&nbsp;
            <a href="{{ url('order/pdf/2') }}" class="btn btn-success btn-lg" >Download In Pdf</a>

        </div>
    </div>
</div>

</body>
</html>
