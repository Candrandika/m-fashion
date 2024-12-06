<div class="modal modal-lg fade" tabindex="-1" id="modal-detail-transaction">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="mb-0 fw-semibold">Daftar Produk Dibeli</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped align-middle" id="table-product-list">
                    <thead>
                        <tr>
                            <th>Produk (Warna - Ukuran)</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 5; $i++)
                            <tr>
                                <td>Produk {{ $i + 1 }}</td>
                                <td>{{ $i + 1 }}</td>
                                <td>Rp 100.000</td>
                                <td>Rp {{ number_format(($i + 1) * 100000, 0, ',', '.') }}</td>
                            </tr>
                        @endfor
                        <tr>
                            <th colspan="3" class="bg-muted text-white">Total</th>
                            <th class="bg-muted text-white">Rp 1.650.000</th>
                        <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-show', function() {
                const formatter = new Intl.NumberFormat('id-ID')

                const products = $(this).data('products')

                let total = 0
                let product_view = ''

                products.forEach((item) => {
                    product_view = `
                        <tr>
                            <td>${item.name} (${item.color} - ${item.size})</td>
                            <td>${formatter.format(item.quantity)}</td>
                            <td>Rp ${formatter.format(item.price)}</td>
                            <td>Rp ${formatter.format(item.total_price??0)}</td>
                        </tr>
                    `

                    total += item.total_price ?? 0
                })

                product_view += `
                    <tr>
                        <th colspan="3" class="bg-muted text-white">Total</th>
                        <th class="bg-muted text-white">Rp ${formatter.format(total)}</th>
                    <tr>
                `

                $('#table-product-list tbody').html(product_view)

            })
        })
    </script>
@endpush
