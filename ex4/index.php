<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./css/bootstrap.min.css" rel="stylesheet" >
        <link href="./css/app.css" rel="stylesheet" >

        <title>WWW.SUFFOLK-HOLIDAYS.CO.UK</title>
    </head>
    <body class="container-fluid">
        <main>
            <div class="row justify-content-center">
                <div class="col">
                    <h1>WWW.SUFFOLK-HOLIDAYS.CO.UK</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <form id="contact">
                        <fieldset>
                            <legend>Want to buy this domain ?</legend>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" placeholder="title" class="form-control" id="title">
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" placeholder="Surname" class="form-control" id="surname">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" placeholder="Email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <textarea placeholder="Your message"  class="form-control" id="message"></textarea>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal" >Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </main>
        <div class="modal" tabindex="-1" id="modal">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Information you entered</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="./js/app.js"></script>
    </body>
</html>
 