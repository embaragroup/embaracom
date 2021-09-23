<style>
    p {
        color: white
    }
    #paketfilter{
        text-align: center
    }
    .form-select {
        border-radius: 1rem;
    }
    @media (max-width: 414px) {
        p {
            font-size: 14px;
            color: white
        }

        .btn-search {
            text-align: center;
        }

        .form-select {
            font-size: 12px;
        }
        .text-align{
            text-align: left
        }
    }
</style>

<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12" id="paketfilter">
    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
        <div class="text-align">
                <label class=" btn btn-outline-white" for="btncheck1"><span>
                <p> Destinasi: &nbsp; </p>
            </span>
            <select class="form-select btn btn-light" aria-label="Default select example">
                <option selected>Jakarta, Pulau Seribu</option>
                <option value="1">Jakarta, Bali</option>
                <option value="2">Bandung, Pantai selatan</option>
                <option value="3">Tangerang, Malioboro</option>
            </select>
            </label>

            <label class="btn btn-outline-white"><span>
                    <p> Berangkat: &nbsp;</p>
                </span>
                <input type="date" class="form-select btn btn-light">
            </label>

            <label class="btn btn-outline-white active" for="btncheck3"><span>
                    <p> Kategori Trip: &nbsp; </p>
                </span>
                <select class="form-select btn btn-light">
                    <option value="">Pelajar</option>
                    <option value="">Muslim</option>
                    <option value="">Mahasiswa</option>
                </select>
            </label>

            <label class="btn-search">
                <button class="btn btn-dark"> <i class="fa fa-search" aria-hidden="true"></i> Cari</button>
            </label>
        </div>
    </div>
</div>
