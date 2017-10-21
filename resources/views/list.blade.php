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
                            <a href="#" id="addNewList" class="pull-right"  data-toggle="modal" data-target="#editList"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </h3>
                    </div>
                    <div class="panel-body" id="itemsBody">
                        <ul class="list-group">
                            @foreach($items as $item)
                                <li class="list-group-item listItem" data-toggle="modal" data-target="#editList">
                                    {{ $item->item }}
                                    <input type="hidden" value="{{ $item->id }}" id="itemId">
                                </li>
                            @endforeach
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
                            <h4 class="modal-title" id="panelTitle">Add New Item</h4>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="hidden" id="itemIdInModal">
                            <p><input type="text" class="form-control" id="addListItem"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" id="deleteItemBtn" data-dismiss="modal" style="display: none;">Delete</button>
                            <button type="button" class="btn btn-primary" id="saveItemBtn" style="display: none;" data-dismiss="modal">Save changes</button>
                            <button type="button" class="btn btn-primary" id="addListBtn" data-dismiss="modal">Add Item</button>
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
            // $(document)
            $(document).on('click', '.listItem', function(event) {
                /*
                 *on click each list item
                 */
                var listItemText = $.trim($(this).text());
                var itemId = $(this).find("#itemId").val()
//                console.log(itemId);
                $("#panelTitle").text("Edit Item");
                $('#addListItem').val(listItemText);
                $('#deleteItemBtn').show();
                $('#saveItemBtn').show();
                $('#addListBtn').hide();
                $('#itemIdInModal').val(itemId);
            });
            $(document).on('click', '#addNewList', function(event) {
                /*
                 *on click add new item
                 */
                $("#panelTitle").text("Add New Item");
                $('#addListItem').val("");
                $('#deleteItemBtn').hide();
                $('#saveItemBtn').hide();
                $('#addListBtn').show();
            });
//
            $("#deleteItemBtn").on('click', function(){
                var itemId = $('#itemIdInModal').val();
                $.post(
                    'list/delete', { 'itemId':itemId, '_token':$('input[name=_token]').val() }, function (data) {
                    $('#itemsBody').load(location.href + ' #itemsBody > *');
                });
            });

            $("#saveItemBtn").on('click', function(){
                var itemId = $('#itemIdInModal').val();
                var itemValue = $('#addListItem').val();
                $.post(
                        'list/edit', { 'itemId':itemId, 'itemValue':itemValue, '_token':$('input[name=_token]').val() }, function (data) {
                        $('#itemsBody').load(location.href + ' #itemsBody > *');
                });
            });

            $("#addListBtn").click(function (event) {
                var listText = $("#addListItem").val();
                /*
                 * listtext holds the data to be sent
                 * token is sent for csrf
                 *
                 */
                $.post(
                    'list', { 'listText':listText, '_token':$('input[name=_token]').val() }, function (data) {
                    $('#itemsBody').load(location.href + ' #itemsBody > *');
                });
            });
        });
    </script>
</body>
</html>