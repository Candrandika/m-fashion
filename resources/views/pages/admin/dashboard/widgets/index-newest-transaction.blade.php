<div class="card">
    <div class="card-header">
        <h5 class="card-title m-0">Transaksi Terbaru</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="newest-transaction-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jumlah Item</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <th>{{ $i+1 }}</th>
                            <td>{{ Date('d M Y') }}</td>
                            <td>200</td>
                            <td>Rp 1.000.000</td>
                            <td>
                                <span class="badge bg-light-primary text-primary">Diproses</span>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#newest-transaction-table').DataTable({
                order: [[1, 'asc']],
                searching: false,
                paging: false,
                info: false,
                columnDefs: [
                    {width: '20px', targets: 0},
                ]
            });
        })
    </script>
@endpush