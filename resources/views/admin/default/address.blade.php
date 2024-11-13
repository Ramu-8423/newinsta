<div class="container mt-1">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="header p-3">
                                        <img src="logo.png" alt="Logo" class="logo float-left">
                                        <h4>INTUITIVE INFO SERVICES PVT. LTD.</h4>
                                        <p>BETTER HIRING | SMART SCREENING</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-12">
                                    <table class="table table-bordered">
                                        <tbody id="sortable-body">
                                            @php
                                            $ver = json_decode($details->report_layout_order);
                                            @endphp
                                            @foreach($ver as $value)
                                            @php
                                            $htmlContent = json_decode($column_layout->$value);
                                            echo Blade::render($htmlContent, ['details' => $details]);
                                            @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>

                            @if(($details->progress_status==2&&$details->remark_status==0)||$details->progress_status==3&&$details->remark_status==1)
                            <div class="border-top">
                                <div class="card-body" style="display:flex;justify-content:end;">
                                    <a
                                        href="{{route('approve_layout_order',['id'=>$id,'remark_status'=>$details->remark_status])}}"><button
                                            type="submit" class="btn btn-primary" name="submit">Approve</button></a>
                                            <a style="margin-left:10px;"><button class="btn btn-primary">Upload custom layout</button></a>
                                </div>
                            </div>
                            @else
                              <div class="card-body" style="display:flex;justify-content:end;">
                                <a><button class="btn btn-primary">Edit</button></a>
                                <a style="margin-left:10px;"><button class="btn btn-primary">Submit Form</button></a>
                                </div>
                            @endif

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
                                        fetch('{{ route("update_layout_order") }}', {
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


                        </div>