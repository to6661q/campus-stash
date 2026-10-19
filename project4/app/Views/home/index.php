<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head runat="server">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $("[id$=myButtonControlID]").click(function(e) {
                window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('div[id$=divTableDataHolder]').html()));
                e.preventDefault();
            });
        });
    </script>
</head>

<body>
    <form id="form1" runat="server">
        <button id="myButtonControlID">Export Table data into Excel</button>
        <div id="divTableDataHolder">
            <table id="example" class="display" style="width: 100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800<img src="../public_html/img/detail.png" /></td>
                    </tr>
                    ...more data...
            </table>
        </div>
    </form>
</body>

</html>