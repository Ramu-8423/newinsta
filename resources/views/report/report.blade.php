@extends('admin.body.adminmaster')

@section('admin')
<style>
input {
    box-sizing: border-box;
    border: 1px solid #82eb82 !important;
}

.table {
    table-layout: fixed;
    width: 100%;
    max-height: 80vh;
    /* Set a max height for the table */
    overflow-y: auto;
    /* Enable scrolling inside the table */
}

.table th,
.table td {
    vertical-align: middle;
    border: 1px solid #000;
    padding: 5px;
    /* Reduce padding */
    line-height: 1.2;
    /* Adjust line height */
}

.table th {
    color: black;
    font-weight: bold;
}

.header {
    background-color: #2e2e61;
    color: #fff;
    text-align: center;
    padding: 10px;
    /* Reduce padding */
}

.sub-header {
    background-color: #d3d3d3;
    text-align: center;
    font-weight: bold;
}

.logo {
    width: 50px;
}

.container {
    max-height: 100vh;
    /* Ensure container height fits screen */
    overflow: hidden;
    /* Prevent page scrolling */
}

th>b {
    color: black;
    font-weight: bold;
}

.custom-heading {
    color: #5e60a9;
    font-size: 30px;
    text-align: left;
    margin: 20px 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
}

.custom-box {
    width: 100%;
    height: 50vh;
    box-shadow: 5px 7px 18px #162c23;
    text-shadow: 2px 2px 4px rgb(204 147 147 / 60%);
}
</style>
<div class="page-wrapper">
    <div class="card-body" style="display:flex;justify-content:end;">
        <a style="margin-left:10px;"><button class="btn btn-primary" onclick="history.back()">back</button></a>
    </div>
    <div class="container-fluid mt-1">
        <table class="table table-bordered responcive">
            <tbody id="sortable-body">
                @php
                $ver = json_decode($details->report_layout_order);
                @endphp
                @foreach($ver as $value)
                @php
                $htmlContent = json_decode($column_layout->$value);
                @endphp
                {!! Blade::render($htmlContent, ['details' => $details]) !!}
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<div class="card-body" style="display:flex;justify-content:end;">
    <a><button class="btn btn-primary">Edit</button></a>
    <a style="margin-left:10px;"><button class="btn btn-primary">Submit Form</button></a>
</div>
   <script
                                src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
                            <script>
                                var client_id_js = @json($id);
                                var remark_status = @json($details -> remark_status);
                                var progress_status = @json($details -> progress_status);
                                console.log(client_id_js, progress_status, remark_status);
                                var sortable = new Sortable(document.getElementById('sortable-body'), {
                                    animation: 150,
                                    handle: 'tr', // Allow row dragging
                                    onEnd: function (evt) {
                                        var order = [];
                                        // Collect the order of rows after drag
                                        document.querySelectorAll('#sortable-body tr[data-id]').forEach((row) => {
                                            order.push(row.getAttribute('data-id'));
                                        });

                                        // Log the new order in the console
                                        console.log('New order:', order);

                                        // Send the new order to the server
                                        fetch('{{ route("client_details_order") }}', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
                                            },
                                            body: JSON.stringify({
                                                order: order,
                                                id: client_id_js,
                                                progress_status: progress_status,
                                                remark_status: remark_status
                                            }) // Send the new order as JSON
                                        }).then(response => {
                                            if (response.ok) {
                                                console.log(response.ok);
                                                console.log('Order updated successfully.');
                                            } else {
                                                console.log('Error updating the order.');
                                            }
                                        }).catch(error => {
                                            console.error('Error:', error);
                                        });
                                    }
                                });
                            </script>

@endsection