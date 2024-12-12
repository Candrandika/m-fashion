@extends('layouts.main.index')

@section('subtitle', 'Keranjang')

@section('content')
    @include('components.alerts.index')

    <div class="container">
        <h4 class="fw-bolder my-5 ms-5">Keranjang</h4>
        <div class="my-5">
            <table class="table align-middle" id="product-carts">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="check-all-products">
                        </th>
                        <th>Produk</th>
                        <th>Harga Satuan</th>
                        <th>Kuantitas</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($carts as $item)
                        <tr data-cart="{{ $item }}">
                            <td>
                                <input type="checkbox" class="product-check">
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('storage/' . $item->product_detail->product->image) }}" alt="produk"
                                        class="object-fit-cover rounded" width="50" height="50">
                                    <div>
                                        <h6 class="fw-semibold mb-0">{{ $item->product_detail->product->name }}</h6>
                                        <div class="text-muted">{{ $item->product_detail->color->color }}
                                            {{ $item->product_detail->size->size }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                Rp {{ number_format($item->product_detail->product->price, 0, ',', '.') }}
                            </td>
                            <td>
                                <div class="input-group" style="max-width: 200px">
                                    <button class="btn btn-decrease">-</button>
                                    <input type="number" class="form-control input-qty" data-max="{{ $item->product_detail->stock }}" value="{{ $item->total }}">
                                    <button class="btn btn-increase">+</button>
                                </div>
                            </td>
                            <td>
                                <div class="text-dark fw-semibold">Rp <span class="total-price">{{ number_format(($item->total * $item->product_detail->product->price), 0, ',', '.') }}</span></div>
                            </td>
                            <td>

                                <button type="button" class="text-danger border-0 bg-transparent fs-6 btn-delete">
                                    <t class="ti ti-trash"></t>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th class="fw-bolder text-center text-muted" colspan="6">-- Tidak ada data --</th>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6"></td>
                    </tr>
                    {{-- <tr>
                        <td colspan="2" class="text-dark fw-bold">Voucer</td>
                        <td colspan="2"></td>
                        <td colspan="2">
                            <div class="d-flex">
                                <input type="text" class="form-control" placeholder="Masukkan kode voucer">
                                <div class="input-group-text bg-transparent"><i class="ti ti-check"></i></div>
                            </div>
                        </td>
                    </tr> --}}
                    <tr>
                        <td colspan="6">
                            <div class="d-flex align-items-center gap-4 justify-content-end">
                                <div>Total</div>
                                <div class="text-black fw-bolder fs-7">Rp <span class="all-total">0</span></div>
                            </div>
                            <button type="button" class="btn btn-lg btn-dark w-100" id="btn-checkout">Checkout</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <form action="" method="post" id="form-delete">
        @csrf
        @method("DELETE")

    </form>

    <form action="{{ route('checkout') }}" method="post" id="form-checkout">
        @csrf
        <input type="hidden" name="product_json" value="">
    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            const formatter = new Intl.NumberFormat('id-ID')

            // Handle Checkbox
            isAllChecked();

            function isAllChecked() {
                var allChecked = true;
                $('.product-check').each(function() {
                    if (!$(this).is(':checked')) {
                        allChecked = false;
                    }
                })

                if (allChecked) $('.check-all-products').prop('checked', true)
                else $('.check-all-products').prop('checked', false)

                countAllTotal()
            }

            $(document).on('click', '.check-all-products', function() {
                if ($(this).is(':checked')) {
                    $('.product-check').prop('checked', true)
                } else {
                    $('.product-check').prop('checked', false)
                }

                countAllTotal()
            })

            $(document).on('click', '.product-check', function() {
                isAllChecked()
            })

            function countAllTotal() {
                let total = 0;
                
                $('#product-carts tbody tr[data-cart] .product-check:checked').each(function(index, el) {
                    const row = $(el).closest('tr')
                    const cart = row.data('cart')

                    const price = cart.product_detail.product.price
                    const qty = parseInt(row.find('.input-qty').val())

                    total += (price * qty)
                })

                $('.all-total').html(formatter.format(total))
            }


            // Handle Quantity
            $(document).on('input', '.input-qty', function() {
                let max = $(this).data('max')

                if (!$(this).val()) $(this).val(1)
                else if (parseInt($(this).val()) < 1) $(this).val(1)
                else if (parseInt($(this).val()) > max) $(this).val(max)
                else $(this).val(Math.floor($(this).val()))

                const row = $(this).closest('tr')
                const cart = row.data('cart')

                const total_price = parseInt(row.find('.input-qty').val()) * cart.product_detail.product.price
                row.find('.total-price').html(formatter.format(total_price))

                countAllTotal()

            })

            function handleQtyChange(input, number) {
                const value = parseInt(input.val())
                const new_value = value + number
                if (new_value < 1) deleteRow(input.closest('tr'))
                input.val(new_value)
                input.trigger('input')
            }

            $(document).on('click', '.btn-decrease', function() {
                handleQtyChange($(this).closest('td').find('.input-qty'), -1)
            })

            $(document).on('click', '.btn-increase', function() {
                handleQtyChange($(this).closest('td').find('.input-qty'), 1)
            })


            // Handle delete
            function deleteRow(row) {
                let delete_url = "{{ route('carts.destroy', ':id') }}"
                const product = row.data('cart')
                delete_url = delete_url.replace(':id', product.id)
                $('#form-delete').attr('action', delete_url)
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Produk akan dihapus dari keranjang anda",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form-delete').submit()
                    }
                })
            }

            $(document).on('click', '.btn-delete', function() {
                deleteRow($(this).closest('tr'))
            })

            // Handle checkout
            $(document).on('click', '#btn-checkout', function() {
                const product_json = []

                if($('#product-carts tbody tr[data-cart] .product-check:checked').length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Pilih produk terlebih dahulu',
                    })
                    return;
                }

                $('#product-carts tbody tr[data-cart] .product-check:checked').each(function(index, el) {
                    const row = $(el).closest('tr')
                    const product = {
                        id: row.data('cart').id,
                        qty: parseInt(row.find('.input-qty').val())
                    }

                    product_json.push(product)
                })

                $('#form-checkout [name=product_json]').val(JSON.stringify(product_json))
                $('#form-checkout').submit()
            })
        });
    </script>
@endpush
