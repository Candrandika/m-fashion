<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-categories">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pembeli</th>
                        <th>Tanggal Pembelian</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 25; $i++)
                        <tr>
                            <th>{{ $i + 1 }}</th>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded object-fit-cover" width="40" height="40" alt="">
                                    <div>
                                        <div class="fw-bolder">Pengguna {{ $i + 1 }}</div>
                                        <div class="text-truncate" style="max-width: 400px;">user@gmail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ Date('d M Y') }}
                            </td>
                            <td>
                                @if($i % 2 == 0)
                                <span class="badge bg-secondary text-white">Pengiriman</span>
                                @else
                                <span class="badge bg-warning text-white">Pending</span>
                                @endif
                            </td>
                            <td>
                                Rp 10.000.000
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <button type="button" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#modal-detail-transaction"><div class="ti ti-eye"></div></button>
                                    <button type="button" class="btn btn-warning p-2" data-bs-toggle="modal" data-bs-target="#modal-edit-status-transaction"><div class="ti ti-edit"></div></button>
                                </div>
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
            $('#table-categories').DataTable({
                dom: "<'row mt-2 justify-content-between align-items-center'<'col-md-auto custom-container-left'><'col-md-auto ms-auto custom-container-right'>><'row mt-2 justify-content-between'<'col-md-auto me-auto'l><'col-md-auto me-start'f>><'row mt-2 justify-content-md-center'<'col-12'rt>><'row mt-2 justify-content-between align-items-center'<'col-md-auto me-auto'i><'col-md-auto ms-auto'p>>",
                    initComplete: function() {
                        $('.custom-container-right').html(`
                            <div>
                                <label for="filter-status">Status:</label>
                                <select id="filter-status" class="form-select form-select-sm d-inline-block w-auto ms-1">
                                    <option value="">Semua Transaksi</option>
                                    <option value="pending">Pending</option>
                                    <option value="paid">Dibayar</option>
                                    <option value="expired">Transaksi Kedaluwarsa</option>
                                    <option value="failed">Transaksi Gagal</option>
                                    <option value="shipping">Dikirim</option>
                                    <option value="complete">Transaksi Selesai</option>
                                </select>
                            </div>
                        `);
                    }
            });
        })
    </script>
@endpush