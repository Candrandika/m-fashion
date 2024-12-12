<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-categories">
            </table>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-categories').DataTable({
                dom: "<'row mt-2 justify-content-between align-items-center'<'col-md-auto custom-container-left'><'col-md-auto ms-auto custom-container-right'>><'row mt-2 justify-content-between'<'col-md-auto me-auto'l><'col-md-auto me-start'f>><'row mt-2 justify-content-md-center'<'col-12'rt>><'row mt-2 justify-content-between align-items-center'<'col-md-auto me-auto'i><'col-md-auto ms-auto'p>>",
                ajax: '{{ route("data-table.transaction") }}',
                serverSide: true,
                order :[[2, 'desc']],
                columns: [
                    {
                        title: '#',
                        data: 'DT_RowIndex',
                    },
                    {
                        title: 'Pembeli',
                        data: 'user_id'
                    },
                    {
                        title: 'Tanggal Pembelian',
                        data: 'created_at',
                        render: function(data, type, row) {
                            return moment(data).locale('id').format('DD MMM YYYY HH:mm')
                        }
                    },
                    {
                        title: 'Status',
                        data:'status',
                        render: function(data, type, row) {
                            const status = {}

                            switch(data) {
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

                            return `<span class="badge ${status.color}">${status.text}</span>`
                        }
                    },
                    {
                        title: 'Total Harga',
                        data: 'price',
                        render: function(data, type, row) {
                            const formatter = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                maximumFractionDigits: 0
                            })
                            return formatter.format(data)
                        }
                    },
                    {
                        title: 'Aksi',
                        mRender: function(data, type, row) {
                            const product = {...row}
                            delete product.customer_details
                            delete product.item_details

                            return `<div class="d-flex align-items-center gap-1">
                                    <button type="button" class="btn btn-primary p-2 btn-show" data-bs-toggle="modal"
                                        data-bs-target="#modal-detail-transaction" data-products="${row.item_details}">
                                        <div class="ti ti-eye"></div>
                                    </button>
                                    <button type="button" class="btn btn-warning p-2 btn-edit" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit-status-transaction" data-data='${JSON.stringify(product)}'>
                                        <div class="ti ti-edit"></div>
                                    </button>
                                </div>`
                        }
                    }
                ],
                initComplete: function() {
                    $('.custom-container-right').html(`
                        <div>
                            <label for="filter-status">Status:</label>
                            <select id="filter-status" class="form-select form-select-sm d-inline-block w-auto ms-1">
                                <option value="">Semua Transaksi</option>
                                <option value="PENDING">Pending</option>
                                <option value="PAID">Dibayar</option>
                                <option value="EXPIRED">Transaksi Kedaluwarsa</option>
                                <option value="FAILED">Transaksi Gagal</option>
                                <option value="REJECTED">Transaksi Ditolak</option>
                                <option value="SHIPPING">Dikirim</option>
                                <option value="COMPLETE">Transaksi Selesai</option>
                            </select>
                        </div>
                    `);
                }
            });
        })
    </script>
@endpush
