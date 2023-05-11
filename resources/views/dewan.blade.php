<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
    <!----Navbar-->
    <nav class="navbar navbar-dark bg-custom1 p-1">
        <div class="col-sm-1 text-start">
            <img src="<?= base_url()?>/asset/img/logo-cempaka-putih.png" style="max-width: 50px;">
        </div>
        <div class="col-sm-11 text-center">
            <h2 class="text-white"> TANDING - KELAS DEWASA - FINAL ( ARENA A MATCH 1 )</h2>
        </div>

    </nav>
    <!--Navbar end-->
    <!---Content-->
    <div class="container-fluid mt-2 p-2">
        <div class="row">
            <div class="col-2 text-end">
                <h6>KONTINGEN 2</h6>
            </div>
            <div class="col text-center">
                <h5>ARENA A</h5>
            </div>
            <div class="col-2 text-start">
                <h6>KONTINGEN 1</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-2 text-end">
                <h3 class="text-danger fw-bold">PESILAT 2</h3>
            </div>
            <div class="col-3">
                <h1 class=" text-center text-danger" style="border-radius: 20px;">0</h1>
            </div>
            <div class="col-2">
                <h1 class="bg-custom1 text-center text-white" style="border-radius: 20px;">02:00</h1>
            </div>
            <div class="col-3">
                <h1 class=" text-center text-primary" style="border-radius: 20px;">0</h1>
            </div>
            <div class="col-2 text-start">
                <h3 class="text-primary fw-bold">PESILAT 1</h3>
            </div>
        </div>
        <!-- <form> -->
        <table class="table-bordered" style="width:100%; font-size: 14px;">
            <!--head1-->
            <tr>
                <th class="text-center bg-danger2 text-white" style="width:5%; font-size: 15px;">TOTAL</th>
                <th class="text-center bg-danger2 text-white" style="width:40%; font-size: 15px;" colspan="3">POINT</th>
                <th class="text-center" style="width: 10%;" rowspan="2">ROUND</th>
                <th class="text-center bg-primary2 text-white" style="width:40%; font-size: 15px;" colspan="3">POINT
                </th>
                <th class="text-center bg-primary2 text-white" style="width: 5%; font-size: 15px;">TOTAL</th>
            </tr>
            <!--end head1-->
            <!--head2-->
            <tr>
                <th class="text-center" rowspan="7">Total</th>
                <th class="text-center" style="width: 4%;" rowspan="4">0</th>
                <th class="text-center" style="width:30%;"></th>
                <th class="text-center bg-danger2 text-white">Juri 1</th>
                <th class="text-center bg-primary2 text-white">Juri 1</th>
                <th class="text-center" style="width:30%;"></th>
                <th class="text-center" style="width:4%" rowspan="4">0</th>
                <th class="text-center" rowspan="7">Total</th>
            </tr>
            <!--end head2-->
            <!--head3-->
            <tr>
                <th class="text-center"></th>
                <th class="text-center text-white bg-danger2">Juri 2</th>
                <th class="text-center" rowspan="6">
                    <h1>1</h1>
                </th>
                <th class="text-center text-white bg-primary2">Juri 2</th>
                <th class="text-center"></th>
            </tr>
            <!--end head3-->
            <!--head4-->
            <tr>
                <th class="text-center"></th>
                <th class="text-center text-white bg-danger2">Juri 3</th>
                <th class="text-center text-white bg-primary2">Juri 3</th>
                <th class="text-center"></th>
            </tr>
            <!--end head4-->
            <!--head5-->
            <tr>
                <th class="text-center"></th>
                <th class="text-center text-white bg-danger2">Score</th>
                <th class="text-center text-white bg-primary2">Score</th>
                <th class="text-center"></th>
            </tr>
            <!--end head5-->
            <!--head6-->
            <tr>
                <th class="text-center"></th>
                <th class="text-center"></th>
                <th class="text-center text-white bg-danger2">Jatuhan</th>
                <th class="text-center text-white bg-primary2">Jatuhan</th>
                <th class="text-center"></th>
            </tr>
            <!--end head6-->
            <!--head7-->
            <tr>
                <th class="text-center"></th>
                <th class="text-center"></th>
                <th class="text-center text-white bg-danger2">Pinalti</th>
                <th class="text-center text-white bg-primary2">Pinalti</th>
                <th class="text-center"></th>
            </tr>
            <!--end head7-->
            <!--head8-->
            <tr>
                <th class="text-center" colspan="2"></th>
                <th class="text-center text-white bg-danger2">Peringatan lisan</th>
                <th class="text-center text-white bg-primary2">Peringatan lisan</th>
                <th class="text-center" colspan="2"></th>
            </tr>
            <!--end 8-->
        </table>
        <!-- </form> -->
    </div>
    <!---content end-->
    </body>
</html>
