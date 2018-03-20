function fnFormatDetails ( oTable, nTr )
{
    var aData = oTable.fnGetData( nTr );

    var invoiceno=aData[2];
    var sOut = '<div id="payments" style="padding-left:50px;">';
    sOut += '<div class="col-md-12"><h3>Payment Details For Invoice Number '+ invoiceno +'</h3></div>';
    sOut += '<table class="display table table-bordered table-striped" style="padding-left:50px;">';
    sOut += '<thead><th>S.no</th>';
    sOut += '<th>Payment Amount</th>';
    sOut += '<th>Payment Date</th>';
    sOut += '<th>Reviews</th>';
    sOut += '<th>Action</th>';
    sOut += '</thead>';
     sOut += '<tbody>';

    $.get('/getpayment/' +invoiceno , function(response){ 
    var a = JSON.parse(response);

    

     for(var row=0; row < a.length; row++){
         sOut += '<tr>';
        sOut += '<td>'+ row + '</td>';

         sOut += '<td>' + a[row].totalpayment + '</td>';
         sOut += '<td>'+ a[row].payment_date +'</td>';
         sOut += '<td>'+ a[row].reviews +'</td>';
          sOut += '<button value="Act"></button>';
           sOut += '</tr>';
     }

    });
     sOut += '</tbody>';
    sOut += '</table>';
    sOut += '</div>';

    return sOut;
    // var sOut = '<table class="display table table-bordered table-striped" style="padding-left:50px;">';
    //  sOut += '<thead><tr>Details for '+aData[1]+' of '+aData[2]+'</tr></thead';
    // sOut += '<tr><td>Rendering engine:</td><td>'+aData[1]+' '+aData[4]+'</td></tr>';
    // sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
    // sOut += '<tr><td>Extra info:</td><td>And any further details here (img etc)</td></tr>';
    // sOut += '</table>';

    // return sOut;
// })
}

$(document).ready(function() {

    $('#dynamic-table').dataTable( {
        "aaSorting": [[ 0, "desc" ]]
    } );

    /*
     * Insert a 'details' column to the table
     */
    var nCloneTh = document.createElement( 'th' );
    var nCloneTd = document.createElement( 'td' );
    nCloneTd.innerHTML = '<img  src="/assets/img/details_open.png">';
    nCloneTd.className = "center";

    $('#hidden-table-info thead tr').each( function () {
        this.insertBefore( nCloneTh, this.childNodes[0] );
    } );

    $('#hidden-table-info tbody tr').each( function () {
        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
    } );

    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable = $('#hidden-table-info').dataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[1, 'asc']]
    });

    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $(document).on('click','#hidden-table-info tbody td img',function () {
        var nTr = $(this).parents('tr')[0];
        if ( oTable.fnIsOpen(nTr) )
        {
            /* This row is already open - close it */
            this.src = "/assets/img/details_open.png";
            oTable.fnClose( nTr );
        }
        else
        {
            /* Open this row */
           
            this.src = "/assets/img/details_close.png";
            var aData = oTable.fnGetData( nTr );
            var invoiceno=aData[2];
            
            $.get('/getpayment/' +invoiceno , function(response){ 
                var a = JSON.parse(response);
                
                var sOut = '<div id="payments" style="padding-left:50px;">';
                    sOut += '<div class="col-md-12"><h3>Payment Details For Invoice No:  '+ invoiceno +'</h3></div>';
                    sOut += '<table class="display table table-bordered table-striped" style="padding-left:50px;">';
                    sOut += '<thead><th>S.no</th>';
                    sOut += '<th>Payment Amount</th>';
                    sOut += '<th>Payment Date</th>';
                    sOut += '<th>Reviews</th>';
                    sOut += '<th>Action</th>';
                    sOut += '</thead>';
                    sOut += '<tbody>';
                    
                for(var row=0; row < a.length; row++){
                    sOut += '<tr><td>'+ (row + 1) + '</td>';
                    sOut += '<td>' + a[row].totalpayment + '</td>';
                    sOut += '<td>'+ a[row].payment_date +'</td>';
                    sOut += '<td>'+ a[row].reviews +'</td>';
                    sOut += '<td><button class="btn btn-primary btn-xs" data-toggle="modal" href="#myModal10 " id="button_'+ a[row].payment_id +'" paymentid="'+a[row].payment_id+'" amnt="'+ a[row].totalpayment +'" paydate="'+ a[row].payment_date +'" chno="'+ a[row].cheque_no +'" ddno="'+ a[row].d_d_no +'"  mode="'+ a[row].payment_method +'" reviews="'+ a[row].reviews +'" onclick="EditPayment(this)" ><i class="fa fa-pencil"></i></button>';

                    sOut += '<a class="btn btn-danger  btn-xs" id="onDelete"  paymentid="'+a[row].payment_id+'" onclick="DeletePayment(this)"><i class="fa fa-trash-o"></i></a></td></tr>';
               }               
               
                sOut += '</tbody>';
                sOut += '</table>';
                sOut += '</div>';
               
               oTable.fnOpen( nTr, sOut, 'details' );
            });
        }
    } );



} );