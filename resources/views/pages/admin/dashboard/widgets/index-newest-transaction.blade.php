<div class="card">
    <div class="card-header">
        <h5 class="card-title m-0">Transaksi Terbaru</h5>
    </div>
    <div class="card-body pt-0">
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
            newest_transaction_table = $('#newest-transaction-table').DataTable({
                order: [[1, 'asc']],
                searching: false,
                paging: false,
                info: false,
                columnDefs: [
                    {width: '20px', targets: 0},
                ]
            });
        })

        function updateNewestTransactionTable(data) {
            const allRows = []
            data.forEach((d, index) => {
                items = JSON.parse(d.item_details)

                const status = {}

                switch(d.status) {
                    case 'PENDING':
                        status.text = "Pending"
                        status.color = "bg-muted text-white"
                        break;
                    case 'WAITING_ACCEPTION':
                        status.text = "Menunggu Persetujuan"
                        status.color = "bg-light-info text-info"
                        break;
                    case 'PAID':
                        status.text = "Dibayar"
                        status.color = "bg-light-success text-success"
                        break;
                    case 'EXPIRED':
                        status.text = "Kedaluwarsa"
                        status.color = "bg-light-warning text-warning"
                        break;

                    case 'FAILED':
                        status.text = "Gagal"
                        status.color = "bg-light-danger text-danger"
                        break;
                    case 'CANCELED':
                        status.text = "Dibatalkan"
                        status.color = "bg-light-danger text-danger"
                        break;
                    case 'REJECTED':
                        status.text = "Ditolak"
                        status.color = "bg-light-danger text-danger"
                        break;
                    case "SHIPPING":
                        status.text = 'Pengiriman'
                        status.color = 'bg-dark text-white'
                        break;
                    case 'COMPLETE':
                        status.text = 'Selesai'
                        status.color = 'bg-light-success text-success'
                        break; 
                    default: 
                        status.text = "unknown"
                        status.color = "bg-light-secondary text-secondary"
                }

                const row = [
                    index+1,
                    moment(d.created_at).locale('id').format('DD MMM YYYY'),
                    formatNum.format(items.reduce((sum, item) => (sum + item.quantity), 0)),
                    formatRp.format(d.price),
                    `<span class="badge ${status.color}">${status.text}</span>`
                ]
                allRows.push(row)
            })

            newest_transaction_table.clear()
            newest_transaction_table.rows.add(allRows)
            newest_transaction_table.draw()
        }

    </script>
@endpush