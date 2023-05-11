<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <title>Juri</title>

</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col text-end">
            <h6>KONTINGEN 2</h6>
        </div>
        <div class="col text-center">
            <h5>ARENA A</h5>
        </div>
        <div class="col text-start">
            <h6>KONTINGEN 1</h6>
        </div>
    </div>
    <div class="row">
        <div class="col text-end">
            <h3 class="text-danger fw-bold">PESILAT 2</h3>
        </div>
        <div class="col text-start">
            <h3 class="text-primary fw-bold">PESILAT 1</h3>
        </div>
    </div>
    <form>
        <table class="table table-bordered">
            <tr>
                <th class="text-center col-sm-5 bg-danger text-white">Nilai</th>
                <th class="text-center col-sm-1">ROUND</th>
                <th class="text-center col-sm-5 bg-primary text-white">Nilai</th>
            </tr>
            <th>
                <div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="p-4"></th>
                        </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="p-4"></th>
                        </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="p-4"></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </th>
            <th class="text-center p-1">
          <span class="btn btn-outline-warning active" data-bs-toggle="button" aria-pressed="true"><strong>
              <div class="col-sm-1" style="width:60px;">I</div>
            </strong></span>
                <hr>
                <span class="btn btn-outline-warning active" data-bs-toggle="button" aria-pressed="true"><strong>
              <div class="col-sm-1" style="width:60px;">II</div>
            </strong></span>
                <hr>
                <span class="btn btn-outline-warning active" data-bs-toggle="button" aria-pressed="true"><strong>
              <div class="col-sm-1" style="width:60px;">III</div>
            </strong></span>
            </th>
            <th>
                <div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="p-4"></th>
                        </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="p-4"></th>
                        </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="p-4"></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </th>
        </table>
        <table class="table table-borderless">
            <tr>
                <td class="col-2">
                    <div class="row p-2">
                        <button class="btn btn-outline-danger p-4">Pukulan</button>
                        <button class="btn btn-outline-danger p-4 mt-1">Tendangan</button>
                    </div>
                </td>
                <td class="col-3 text-start">
                    <div class="p-2">
                        <button class="btn btn-outline-danger p-4" style=" height: 150px;">Delete</button>
                    </div>
                </td>
                <td class="col-2"></td>
                <td class="col-3 text-end">
                    <div class="p-2">
                        <button class="btn btn-outline-primary p-4" style=" height: 150px;">Delete</button>
                    </div>
                </td>
                <td class="col-2">
                    <div class="row p-2">
                        <button class="btn btn-outline-primary p-4">Pukulan</button>
                        <button class="btn btn-outline-primary p-4 mt-1">Tendangan</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
<script src="js/bootstrap.bundle.min.js"></script>

</html>

<script type="text/javascript">
    document.querySelectorAll('.btn').forEach(buttonElement => {
        const button = bootstrap.Button.getOrCreateInstance(buttonElement)
        button.toggle()
    })
</script>
