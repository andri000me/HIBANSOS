@php
        $_link = explode('/',uri_string());
        $tipe = $_link[1];
        $_idhb = $_link[2];
        $tolaklink = implode('/',[$_link[0],$tipe,'tolak',$_idhb]);
        @endphp

<div class="modal fade" id="modal-tolak" tabindex="100" role="dialog" data-backdrop="false" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-side modal-bottom-right" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{base_url($tolaklink)}}" method="post">
                    <p class="modal-title w-100 text-dark">Tolak proposal</p>
                    <div class="p-2">
                        <div class="md-form">
                            <textarea id="form7" required name="alasanPenolakan" class="md-textarea form-control" placeholder="Alasan penolakan" rows="3"></textarea>
                            <label for="form7">Wajib di isi</label>
                        </div>
                    </div>
                    <button data-dismiss="modal" class="btn btn-sm btn-danger">
                        Tutup
                    </button>
                    <button class="btn btn-sm btn-main1">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>