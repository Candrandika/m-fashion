@extends('layouts.main.index')

@section('subtitle', 'Keranjang')

@section('content')
    <div class="container">
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
                    @for($i = 0; $i < 5; $i++)
                    <tr>
                        <td>
                            <input type="checkbox" class="product-check">
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ asset('dist/images/products/s1.jpg') }}" alt="produk {{ $i+1 }}" class="object-fit-cover rounded" width="50" height="50">
                                <div>
                                    <h6 class="fw-semibold mb-0">Produk {{ $i+1 }}</h6>
                                    <div class="text-muted">Varian Produk</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            Rp 100.000
                        </td>
                        <td>
                            <div class="input-group" style="max-width: 200px">
                                <button class="btn btn-decrease">-</button>
                                <input type="number" class="form-control input-qty" data-max="20" value="1">
                                <button class="btn btn-increase">+</button>
                            </div>
                        </td>
                        <td>
                            <div class="text-dark fw-semibold">Rp 100.000</div>
                        </td>
                        <td>
                            <button type="button" class="text-danger border-0 bg-transparent fs-6 btn-delete"><t class="ti ti-trash"></t></button>

                        </td>
                    </tr>
                    @endfor
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-dark fw-bold">Voucer</td>
                        <td colspan="2"></td>
                        <td colspan="2">
                            <div class="d-flex">
                                <input type="text" class="form-control" placeholder="Masukkan kode voucer">
                                <div class="input-group-text bg-transparent"><i class="ti ti-check"></i></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div class="d-flex align-items-center gap-4 justify-content-end">
                                <div>Total</div>
                                <div class="text-black fw-bolder fs-7">Rp 10.000.000</div>
                            </div>
                            <button class="btn btn-lg btn-dark w-100">Checkout</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            // Handle Checkbox
            isAllChecked();
    
            function isAllChecked() {
                var allChecked = true;
                $('.product-check').each(function() {
                    if (!$(this).is(':checked')) {
                        allChecked = false;
                    }
                })

                if(allChecked) $('.check-all-products').prop('checked', true)
                else $('.check-all-products').prop('checked', false)
            }

            $(document).on('click', '.check-all-products', function() {
                if ($(this).is(':checked')) {
                    $('.product-check').prop('checked', true)
                } else {
                    $('.product-check').prop('checked', false)
                }
            })

            $(document).on('click', '.product-check', function() {
                isAllChecked()
            })


            // Handle Quantity
            $(document).on('input', '.input-qty', function() {
                let max = $(this).data('max')

                if(!$(this).val()) $(this).val(1)
                else if(parseInt($(this).val()) < 1) $(this).val(1)
                else if(parseInt($(this).val()) > max) $(this).val(max)
                else $(this).val(Math.floor($(this).val()))
            })

            function handleQtyChange(input, number) {
                const value = parseInt(input.val())
                const new_value = value + number
                if(new_value < 1) deleteRow(input.closest('tr'))
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
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Produk akan dihapus dari keranjang anda",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        row.remove()
                    }
                })
            }

            $(document).on('click', '.btn-delete', function() {
                deleteRow($(this).closest('tr'))
            })
        });
    </script>
@endpush