<!DOCTYPE html>
<html>
    <head>
        <title>Locatarios IRSA</title>

        <meta charset="UTF-8"></meta>
        <link rel="shortcut icon" href="assets/css/icono.jpg" />
        <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" >
        <script src="assets/css/bootstrap/jquery-3.5.1.slim.min.js" ></script>
        <script src="assets/css/bootstrap/popper.min.js" ></script>
        <script src="assets/css/bootstrap/bootstrap.min.js" ></script>

    </head>
    <body>

        <div class="container">
            <div class="row mt-5">
                <div class="col-2"></div>
                <div class="col-8">
                    <h1>Exportar datos para locatarios de IRSA</h1>
                </div>
                <div class="col-2"></div>
            </div>

            <div>
                <div class="row mt-5">
                    <div class="col">
                        <input type="date" id="desde" class="form-control">
                    </div>
                    <div class="col">
                        <input type="date" id="hasta" class="form-control">
                    </div>
                    <div class="col">
                        <select id="suc" class="form-control">
                            <option value="3">Alto Palermo</option>
                            <option value="6">Avellaneda</option>
                            <option value="7">Abasto</option>
                            <option value="48">Alto Rosario</option>
                            <option value="66">Dot</option>
                            <option value="76">Soleil</option>
                            <option value="78">Arcos</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-5" >
                    <div class="col-2"></div>
                    <div class="col-8">
                        <button class="btn btn-primary btn-block" id="boton" onClick="exportar()">Exportar TXT</button>
                    </div>
                    <div class="col-2"></div>
                    
                </div>
            </div>
        </div>
        
        <script src="js/main.js"></script>

    </body>
</html>