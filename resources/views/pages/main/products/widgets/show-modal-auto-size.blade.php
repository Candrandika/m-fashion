<div class="modal modal-lg fade" tabindex="-1" id="modal-auto-size">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h5 class="text-uppercase fw-bolder m-0">Kami membantu anda menemukan<br /> ukuran yang tepat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="form-calculate-prediction">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{ asset($product->image ? 'storage/' . $product->image : 'dist/images/products/s1.jpg') }}"
                                alt="gambar produk" class="w-100 mb-4">
                        </div>
                        <div class="col-lg-8">
                            <div class="row align-items-center mb-4">
                                <div class="col-lg-2">
                                    <label for="height" class="text-uppercase">Tinggi</label>
                                </div>
                                <div class="col-lg-10">
                                    <div class="input-group rounded-0">
                                        <input type="number" min="1" required
                                            class="form-control rounded-0 border-end-0" name="height">
                                        <div class="input-group-text bg-transparent border border-start-0">cm</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mb-4">
                                <div class="col-lg-2">
                                    <label for="height" class="text-uppercase">Berat</label>
                                </div>
                                <div class="col-lg-10">
                                    <div class="input-group rounded-0">
                                        <input type="number" min="1" required
                                            class="form-control rounded-0 border-end-0" name="weight">
                                        <div class="input-group-text bg-transparent border border-start-0">kg</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-2">
                                    <label for="height" class="text-uppercase">Usia</label>
                                </div>
                                <div class="col-lg-10">
                                    <div class="input-group rounded-0">
                                        <input type="number" min="1" required
                                            class="form-control rounded-0 border-end-0" name="age">
                                        <div class="input-group-text bg-transparent border border-start-0">tahun</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <div class="fs-2">
                                        Usia berdampak pada distribusi berat badan Anda. Mengetahui usia Anda membantu kami
                                        merekomendasikan ukuran yang tepant
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8 d-flex flex-column align-items-center justify-content-center">
                            <button type="submit" class="btn btn-lg btn-dark w-100 rounded-0">Lanjutkan</button>
                            <button type="button" class="btn" data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive" style="display: none;">
                    <table class="table" id="table-predict-size">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ukuran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th colspan="3" class="text-center"> -- tidak ada data --</th>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-dark w-100" id="btn-show-form-calculate">Hitung Ulang</button>
                </div>

            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#form-calculate-prediction', function(e) {
                e.preventDefault();

                const sizes = @json($product->sizes);

                const height = parseInt($('input[name="height"]').val());
                const weight = parseInt($('input[name="weight"]').val());
                const age = parseInt($('input[name="age"]').val());

                const bmi = weight / Math.pow(height / 100, 2)
                const chest_circumference = 1.3 * (height / 100) * bmi;

                const data_predict = [];

                sizes.forEach((size) => {
                    const table_row = {
                        size: size.size
                    }
                    if (size.width - 5 >= chest_circumference) {
                        table_row.status = "<span class='badge bg-light-warning text-warning'>Terlalu Besar Untuk Anda</span>"
                    } else {
                        if (size.width + 1 <= chest_circumference) {
                            table_row.status = "<span class='badge bg-light-danger text-danger'>Terlalu Kecil Untuk Anda</span>"
                        } else {
                            table_row.status = "<span class='badge bg-light-success text-success'>Cukup Untuk Anda</span>"
                        }
                    }

                    data_predict.push(table_row)

                })

                let tb_html = ''
                data_predict.forEach((row, index) => {
                    tb_html += `<tr>
                                <td>${index + 1}</td>
                                <td>${row.size}</td>
                                <td>${row.status}</td>
                            </tr>`
                })


                $('#table-predict-size tbody').html(tb_html)

                $('#table-predict-size').parent().show()
                $('#form-calculate-prediction').hide()
            })
            

            $(document).on('click', '#btn-show-form-calculate', function() {
                $('#table-predict-size').parent().hide()
                $('#form-calculate-prediction').show()
            })
        })
    </script>
@endpush
