<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajax todo list project</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Laravel Todo with ajax
                            <a href="#" class="pull-right"  data-toggle="modal" data-target="#editList"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item listItem" data-toggle="modal" data-target="#editList">Cras justo odio</li>
                            <li class="list-group-item listItem" data-toggle="modal" data-target="#editList">Dapibus ac facilisis in</li>
                            <li class="list-group-item listItem" data-toggle="modal" data-target="#editList">Morbi leo risus</li>
                            <li class="list-group-item listItem" data-toggle="modal" data-target="#editList">Porta ac consectetur ac</li>
                            <li class="list-group-item listItem" data-toggle="modal" data-target="#editList">Vestibulum at eros</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{--==== modal =====--}}
            <div class="modal fade" tabindex="-1" role="dialog" id="editList">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add New Item</h4>
                        </div>
                        <div class="modal-body">
                            <p><input type="text" class="form-control" id="addListItem"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="display: none;">Close</button>
                            <button type="button" class="btn btn-primary" style="display: none;">Save changes</button>
                            <button type="button" class="btn btn-primary" id="addListBtn">Add Item</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div>
    </div>

    <script
            src="http://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $(".listItem").each(function () {
                $(this).click(function (event) {
                    var listItemText = $(this).text();
                    $('#addListItem').val(listItemText);
                });
            });
        });
    </script>
</body>
</html>